<!DOCTYPE html>
<html style="width:100%;height:100%">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv=content-type content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>Slot</title>
</head>
<body style="width:100%; height:auto;">
    <script>
        if( !sessionStorage.getItem('sessionId') ){
            sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
        }
        const sessid = ()=>{
            if( sessionStorage.getItem('sessionId') ){
                return sessionStorage.getItem('sessionId');
            }};
        </script>
        <audio id="splayer" preload="auto"></audio>
        <div id="fullscreen" style="position:absolute; left:0px; top: 0px; width:100%; height:100%; background-color: rgb(0, 0, 0);">
            <div id="container"></div>
            <div id=d_cheat></div>
        </div>
        <script src="/games/BookOfRaDX6GT/jsout.js"></script>
        <script>
            console.log('desktop');
            var params = {
            "basedir": "/games/BookOfRaDX6GT/",
            "hostname": "localhost",
            "port": "22087",
            "skin": "english",
            "roomid": "InitGame:BookOfRaDX6GT:"+sessid()+":"+document.cookie+":Greentube",
            "gamename": "BookOfRaDX6GT",
            "devicetype": "desktop",
			"screenrotation.enabled": "0",
            "winlabels.show": "1",
            "issound": "1",
            "showrealitycheckbeforeleaving": "0",
            "autofullscreen": "0",
            "crypto": "1",
            "forcerealitycheck": "0",
            "hasreplay": "0",
            "html5": "1",
            "isspainversion": "0",
            "nolobby": "0",
            "realitycheckintervalminutes": "0",
            "realitycheckintervalrounds": "0",
            "showpayindialog": "0",
            "showsessiontime": "0",
            "showsessionsummary": "0",
            "splashscreen": "0",
            "h265video": "0",
            "paytable.abbreviate": "1",
            "cih.novosdk.gameserver.show": "0",
            "cih.factory.gameserver.show": "1",
            "cih.math.gameserver.show": "1",
            "cih.devicetype.gameclient.show": "0",
            "cih.lastupdate.gameclient.show": "0",
            "cih.build.gameserver.show": "1",
            "button.help.show": "1",
            "button.touch2start.show": "0",
            "branding": "gametwist",
            "bingo.ui.extrainfo.show": "0",
            "gamble.default.set.on": "1",
            "currencyvalues.abbreviate": "1",
			"consoleenabled": "true",
            "console.show": "true",
            "gamemenu.show": "true",
            "ticket_type": "1",
            "width": "960",
            "height": "768",
            "crypto": "0",
            "realitycheckintervalminutes": "6000",
            "realitycheckintervalrounds": "0",
            "exitprogramonconnectionerror": "0",
            "nolobby": "1",
            "issound": "1",
            "ismusicactive": "1",
            "splashscreen": "0",
            "html5": "1",
            "reliability": "1",
            "forcerealitycheck": "1",
            "hasreplay": "0",
            "hidecurrencysymbols":"1",
            "showsessiontime": "0",
            "showsessionsummary": "0",
            "showrealitycheckbeforeleaving": "0",
            "isspainversion": "0",
            "showpayindialog": "0",
            "forcewebsocket": "1",
            "debugsmartrepaint": "true",
            "autopayin": "0",
            "h265video": "0",
            "branding": "stargames",
            //"debug": "true",
            //"resourceurl": "https://grandxmega.com//games/Greentube/Bookofradeluxe6GT/",
            "closeurl": "/",
          	//"ui.neon.disabled": "false",
			//"closeurl": "javascript:alert('close')"
        };
        SLOT.start({
            container : {
                container: "container",
                fullscreen : "fullscreen",
                cheat_container : "d_cheat",
                audio_container : "splayer"
            }
        }, params);
    </script>
</body>

</html>
