<footer>
    <div class="footer-content">
        <div class="logo-container">
            <a href="{{ route('index') }}"><img class="logo" src="{{ asset('images/logo.svg') }}" alt="logo"></a>
        </div>

        @include('includes.links')

        <div class="footer-cards">
            <div class="footer-card">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2614.10224174187!2d20.3140572!3d49.0656912!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473e3b50cc870555%3A0x464c25529e287332!2sTA%20NAJ%20Zmrzlina!5e0!3m2!1sen!2ssk!4v1707849196473!5m2!1sen!2ssk"
                    style="border:0; border-radius: 15px; height: 100%;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer-card espresso">
                <p>Navštívte web našej kaviarne Espressobar!</p>
                <a href="https://www.espressobar.sk">www.espressobar.sk</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-content">
            <p>Copyright © 2023 TA NAJ</p>
            <div class="fb-socials">
                <a target="_blank" href="https://www.facebook.com/ta.naj.poprad"><i
                        class="fa-brands fa-facebook"></i></a>


                <a target="_blank" href="https://www.instagram.com/ta.naj.poprad?igsh=ODUwNm81ajNpZTAy"><i
                        class="fa-brands fa-instagram"></i></a>

            </div>
        </div>
    </div>
</footer>
