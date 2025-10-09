<!-- POPUP REGISTRATION AND AUTHORIZATION -->
<div tabindex="-1" role="dialog" class="modal modal-login" id="login-modal" style="background: transparent;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-base ng-scope">
                <button class="modal-close modal-close--login" title="close" ng-click="closeModal($event)">
                    <i class="icon-woo-close"></i>
                </button>
                <div class="modal-base__header-decor">
                    <img class="modal-base__decor-logo" src="/woocasino/resources/images/logo1.png" alt="">
                </div>
                <h3 class="modal-base__title ng-scope" translate="frontend.links.login">Log In</h3>
                <form ng-submit="sendForm($event)" action="https://total.casino/login" method="POST" data-modal-success="#login-modal">
                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">                    <div class="form">
                        <div class="form__field">
                            <div class="input-elem__label ng-binding">Username</div>
                            <input type="text" name="username" class="input-elem ng-pristine ng-valid ng-empty ng-valid-username ng-touched" id="username" placeholder="Username">
                        </div>
                        <div class="form__field">
                            <div class="input-elem__label ng-binding">Password</div>
                            <input type="password" class="input-elem ng-pristine ng-valid ng-empty ng-touched" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal__error" style="display: none"></div>
                    <div class="modal-base__forgot-password">
                                            </div>
                    <div class="modal-base__btn-wrp">
                        <input type="hidden" value="/" name="is_ajax" id="is_ajax" />
                        <button class="button button-secondary form__btn form__btn--mrg-btm ng-binding" type="submit" style="width:90%;">Login</button>
                        <button class="button button-neutral form__btn ng-scope ng-binding" ng-click="openModal($event, '#registration-confirm')" style="width:90%;">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- POPUP REGISTRATION AND AUTHORIZATION -->
<!-- POPUP RECOVER PASSWORD -->
<!-- POPUP RECOVER PASSWORD -->
<!-- POPUP RECOVER PASSWORD INFO WINDOW -->
<!-- POPUP RECOVER PASSWORD INFO WINDOW -->
<!-- POPUP REGISTRATION -->
<div id="registration-confirm" tabindex="-1" role="dialog" class="modal modal-registration" ng-click="close($event)" modal-window="" window-class="modal-registration" style="background:transparent;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="registry-modal ng-scope">
                <button class="modal-close modal-close--login" title="close" ng-click="closeModal($event)" style="color:black">
                    <i class="icon-woo-close"></i>
                </button>
                <div class="registry-modal__wrap">
                    <div class="registry-modal__content">
                        <div class="registry-modal__content-txt">
                            <div class="registry-modal__mobile-nav">
                                <span class="registry-modal__mobile-logo-wrp">
                                   <!-- <img class="registry-modal__mobile-logo" src="/resources/images/logo.svg" alt="">-->
                                </span>
                                <span class="registry-modal__mobile-close icon-woo-close-bold" data-dismiss="modal" ng-click="$close();"></span>
                            </div>
                            <div class="ng-binding ng-scope ng-isolate-scope">
                                <h2 class="registry-modal__content-title registry-modal__content-title--desktop">
                                    <span class="registry-modal__content-title-small">Welcome Bonus</span>
                                    <span class="registry-modal__content-rows-wrp">
                                        <span class="registry-modal__content-title-big text-color-yellow">$/€200</span>                                <span class="registry-modal__content-title-small ">+ 200 Free Spins</span>
                                    </span>
                                </h2>
                                <h2 class="registry-modal__content-title registry-modal__content-title registry-modal__content-title--mob">
                                    <span class="registry-modal__content-title-small">Welcome Bonus</span>
                                    <span class="registry-modal__content-rows-wrp">
                                        <span class="registry-modal__content-title-big text-color-yellow">$/€200</span>
                                        <span class="registry-modal__content-title-small registry-modal__content-title-small--mob-decor">+ 200 FS</span>
                                    </span>
                                </h2>
                            </div>
                        </div>
                        <div class="registry-modal__reg-mob-ttl ng-binding">Register</div>
                        <ul class="registry-modal__steps registry-modal__steps--1">
                            <li class="registry-modal__item registry-modal__item--1 registry-modal__item--current">
                                <span class="registry-modal__item-txt ng-scope">Profile Information</span>
                            </li>
                            <li class="registry-modal__item registry-modal__item--2">
                                <span class="registry-modal__item-txt ng-scope">Personal Information</span>
                            </li>
                            <li class="registry-modal__item registry-modal__item--3">
                                <span class="registry-modal__item-txt ng-scope">Address Information</span>
                            </li>
                            <li class="registry-modal__item registry-modal__item--prize">
                                <div class="ng-binding ng-isolate-scope ng-scope">
                                    <span class="registry-modal__item-txt-big">Welcome Bonus</span>
                                    <span class="registry-modal__bonus-text-shine">$/€200 + 200 Free Spins</span>
                                    <span class="registry-modal__bonus-text-mob">$/€200 + 200 FS</span>
                                </div>
                                <span class="registry-modal__no-bonus ng-scope">Welcome to 24 7 Casino</span>
                            </li>
                        </ul>
                    </div>
                    <div class="registry-modal__form-wrp">
                        <h2 class="registry-modal__form-ttl ng-binding">Register</h2>
                        <form method="POST" action="{{url('register')}}" ng-submit="sendForm($event)" data-modal-success="#system-notification-success" class="registry-modal__form form form--reg ng-pristine ng-valid ng-isolate-scope">
						@csrf
						                    @if(isset($register_result))
                        <input type="hidden" id="registerresult" value="{{$register_result}}">
                        @if($error = $errors->first())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Wrong!</strong> {{$error}}
                            </div>
                    @endif
                @endif
                            <input type="hidden" value="<?= csrf_token() ?>" name="_token">                            <input type="hidden" value="/" name="is_ajax" id="is_ajax" />
                            <div>
                                <div class="form__step form__step--1">
                                    <div class="form__field form__field--username">
                                        <span class="input-elem__label ng-scope">Username</span>
                                        <input type="text" id="username" name="username" placeholder="Username" class="input-elem ng-pristine ng-valid ng-empty ng-touched">
                                    </div>
                                    <div class="form__field form__field--email">
                                        <span class="input-elem__label ng-scope">Email</span>
                                        <input type="text" id="email" name="email" placeholder="Email" class="input-elem ng-pristine ng-valid ng-empty ng-touched">
                                    </div>
                                    <div class="form__field form__field--password">
                                        <span class="input-elem__label ng-scope">Password</span>
                                        <input placeholder="Password" type="password" name="password" class="input-elem ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty ng-valid-password-strength" autocomplete="off">
                                    </div>
                                    <div class="form__field form__field--confirm_password">
                                        <span class="input-elem__label ng-scope">Confirm Password</span>
                                        <input placeholder="Confirm Password" type="password" id="password_confirmation" name="password_confirmation" class="input-elem ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty ng-valid-confirm_password-strength" autocomplete="off">
                                    </div>
                                    <div class="form__field form__field--age_terms_acceptance form__field--checkbox">
                                        <label class="checkbox-elem">
                                            <input class="checkbox-elem__input ng-pristine ng-untouched ng-valid ng-empty" type="checkbox" placeholder="">
                                            <span class="checkbox-elem__icon icon-woo"></span> 
                                            <span class="checkbox-elem__text">
                                                <span class="ng-binding">
                                                    I am over 18 years old and I have read and accept the terms and conditions.
                                                    <a class="terms-breakdown terms-link tc">Terms & Conditions</a>
                                                </span>
                                                <sup class="checkbox-elem__required">*</sup>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form__btn-wrp">
                                <input class="button button-primary ng-scope" type="submit" value="Register">
                            </div>
                            <div class="registry-modal__form-descr">
                                <span class="ng-binding">Already have an account?</span>
                                <a class="registry-modal__form-descr-link ng-scope ng-binding" ng-click="openModal($event, '#login-modal')">Log In</a>
                            </div>
                            <div class="modal__error" style="display: none"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- POPUP REGISTRATION -->



<!-- POPUP CHANGE PASSWORD -->
<div class="modal popup_changePassword" id="change-password" style="display: none">
    <header class="modal__header">
        <div class="span modal__title">
            Change password </div>
        <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <form ng-submit="sendForm($event)" action="https://total.casino/profile/password/update" method="POST"
        data-modal-success="#password-changed">
        <div class="modal__content">
            <div class="popup__input input">
                <input type="password" name="old_password" required class="modal__input-inner input__inner"
                    placeholder="Current password">
            </div>
            <div class="popup__input input">
                <input type="password" name="password" required class="modal__input-inner input__inner"
                    placeholder="New Password">
            </div>
            <div class="popup__input input">
                <input type="password" name="password_confirmation" required class="modal__input-inner input__inner"
                    placeholder="Confirm Password">
            </div>
            <div class="modal__error" style="display:none">
                <div class="modal__note_important"></div>
            </div>
        </div>
        <div class="popup__footer">
            <input type="submit" value="Change" class="popup__button button" />
        </div>
    </form>
    <div class="modal-preloader" style="display:none"></div>
</div>

<div class="modal" id="password-changed" style="display:none">
    <header class="modal__header">
        <div class="span modal__title">System notification</div>
        <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <div class="modal__content">
        <div class="modal-text">Your password has been changed <br />Good luck in the games!</div>
    </div>
    <div class="popup__footer">
        <input ng-click="closeModal($event)" type="submit" value="Close" class="popup__button button" />
    </div>
</div>
<!-- POPUP CHANGE PASSWORD -->


<div class="modal" id="system-notification-success" style="display:none">
        <header class="modal__header">
                <div class="span modal__title">System notification</div>
                <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
        </header>
        <div class="modal__content">
                <div id="system-notification-success-text" class="modal-text"></div>
        </div>
        <div class="popup__footer">
                <input ng-click="closeModal($event)" type="submit" value="Close" class="popup__button button" />
        </div>
</div>

