<?php 
namespace VanguardLTE\Http\Controllers\Web\Backend
{
    include_once(base_path() . '/app/ShopCore.php');
    include_once(base_path() . '/app/ShopGame.php');
    class DailyEntryController extends \VanguardLTE\Http\Controllers\Controller
    {
        public function __construct()
        {
            $this->middleware([
                'auth', 
                '2fa'
            ]);
            $this->middleware('permission:access.admin.panel');
            $this->middleware('permission:daily_entry.manage');
            $this->middleware('shopzero');
        }
        public function index(\Illuminate\Http\Request $request)
        {

            $daily_entries = \VanguardLTE\DailyEntry::where('shop_id', auth()->user()->shop_id)->orderBy('min_progress', 'asc')->get();
            return view('backend.daily_entries.list', compact('daily_entries'));
        }
        public function create()
        {
            return view('backend.daily_entries.add');
        }
        public function store(\Illuminate\Http\Request $request)
        {
            $request->validate(['wager' => 'required|in:' . implode(',', array_keys(\VanguardLTE\DailyEntry::$values['wager']))]);
            $data = $request->only([
                'min_progress', 
                'max_progress', 
                'min', 
                'max', 
                'status', 
                'wager'
            ]);
            $data['shop_id'] = auth()->user()->shop_id;
            \VanguardLTE\DailyEntry::create($data);
            return redirect()->route('backend.daily_entries.list')->withSuccess(trans('app.daily_entry_created'));
        }
        public function edit($daily_entry)
        {
            $daily_entry = \VanguardLTE\DailyEntry::where([
                'id' => $daily_entry, 
                'shop_id' => auth()->user()->shop_id
            ])->firstOrFail();
            if( !in_array($daily_entry->shop_id, auth()->user()->availableShops()) ) 
            {
                return redirect()->back()->withErrors([trans('app.wrong_shop')]);
            }
            return view('backend.daily_entries.edit', compact('daily_entry'));
        }
        public function update(\Illuminate\Http\Request $request, \VanguardLTE\DailyEntry $daily_entry)
        {
            $request->validate(['wager' => 'required|in:' . implode(',', array_keys(\VanguardLTE\DailyEntry::$values['wager']))]);
            $data = $request->only([
                'min_progress', 
                'max_progress', 
                'min', 
                'max', 
                'status', 
                'wager'
            ]);
            if( !in_array($daily_entry->shop_id, auth()->user()->availableShops()) ) 
            {
                return redirect()->back()->withErrors([trans('app.wrong_shop')]);
            }
            if( $data['max'] < $data['min'] ) 
            {
                return redirect()->back()->withErrors([trans('app.min_more_max')]);
            }
            if( $data['max_progress'] <= $data['min_progress'] ) 
            {
                return redirect()->back()->withErrors([trans('app.min_progress_more_max_progress')]);
            }
            if( $daily_entry->day != 'Monday' ) 
            {
                $prev = \VanguardLTE\DailyEntry::where([
                    'day' => \Carbon\Carbon::parse($daily_entry->day)->subDay()->format('l'), 
                    'shop_id' => $daily_entry->shop_id
                ])->first();
                if( $data['min_progress'] <= $prev->max_progress ) 
                {
                    return redirect()->back()->withErrors([trans('app.min_progress_lower_max_progress_prev')]);
                }
            }
            if( $daily_entry->day != 'Sunday' ) 
            {
                $next = \VanguardLTE\DailyEntry::where([
                    'day' => \Carbon\Carbon::parse($daily_entry->day)->addDay()->format('l'), 
                    'shop_id' => $daily_entry->shop_id
                ])->first();
                if( $next->min_progress <= $data['max_progress'] ) 
                {
                    return redirect()->back()->withErrors([trans('app.max_progress_bigger_min_progress_next')]);
                }
            }
            \VanguardLTE\DailyEntry::where('id', $daily_entry->id)->update($data);
            return redirect()->route('backend.daily_entry.list')->withSuccess(trans('app.daily_entry_updated'));
        }
        public function delete(\VanguardLTE\DailyEntry $daily_entry)
        {
            if( !in_array($daily_entry->shop_id, auth()->user()->availableShops()) ) 
            {
                return redirect()->back()->withErrors([trans('app.wrong_shop')]);
            }
            \VanguardLTE\DailyEntry::where('id', $daily_entry->id)->delete();
            return redirect()->route('backend.daily_entry.list')->withSuccess(trans('app.daily_entry_deleted'));
        }

    }

}
