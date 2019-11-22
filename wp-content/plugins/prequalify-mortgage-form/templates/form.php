<form id="mortgage-form" method="POST" action="<?php print esc_url( $_SERVER['REQUEST_URI'] ) ?>" >
    <h2>Get Pre-Qualified For A Home Loan</h2>
    <div class="wizard clearfix" >
        <h3 hidden>What type of loan are you looking for?</h3>
        <section class="content clearfix" >
            <h4 class="title-loan-type">What type of loan are you looking for?</h4>
            <div class="btn-answer-container actions">
                <a href="#next" class="btn-type btn-answer" data-value="Purchase">
                    <div class="icon">
                        <img alt="" class="icon" height="35" src="<?php print $images_path; ?>refinance_house.png" width="35">
                    </div>
                    <div class="text">
                        Mortgage
                        <br>Purchase
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="Refinance">
                    <div class="icon">
                        <img alt="" class="icon" height="35" src="<?php print $images_path; ?>buy_house.png" width="35">
                    </div>
                    <div class="text">
                        Mortgage
                        <br>Refinance
                    </div>
                </a>
                <input id="loan_type" class="answer" name="loan_type" type="hidden">
            </div>
        </section>
        <h3 hidden>How will you use the property?</h3>
        <section hidden>
            <h4 class="title-property-type" >How will you use the property?</h4>
            <div class="btn-answer-container actions">
                <a href="#next" class="btn-type btn-answer" data-value="Primary Home">
                    <div class="icon">
                        <img alt="" class="icon" height="35" src="<?php print $images_path; ?>first_home.png" width="35">
                    </div>
                    <div class="text">
                        Primary
                        <br>Home
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="Second Home">
                    <div class="icon">
                        <img alt="" class="icon" height="35" src="<?php print $images_path; ?>second_home.png" width="35">
                    </div>
                    <div class="text">
                        Second
                        <br>Home
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="Investment Property">
                    <div class="icon">
                        <img alt="" class="icon" height="35" src="<?php print $images_path; ?>investment.png" width="35">
                    </div>
                    <div class="text">
                        Investment
                        <br>Property
                    </div>
                </a>
                <input id="property_type" class="answer" name="property_type" type="hidden">
            </div>
        </section>
        <h3 hidden>What's your budget?</h3>
        <section hidden>
            <h4 class="title-budget">What's your budget?</h4>
            <div class="budget-container actions">
                <div id="slider-range"></div>
                <input type="text" name="amount" id="amount" readonly>
                <a href="#next" class="btn-continue">
                    Continue
                </a>
            </div>
        </section>
        <h3 hidden>Estimate your credit score?</h3>
        <section hidden>
            <h4>Estimate your credit score</h4>
            <div class="credit-score-container actions">
                <a href="#next" class="btn-type btn-answer" data-value="740+">
                    <div class="text">
                        740+
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="700-739">
                    <div class="text">
                        700-739
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="680-699">
                    <div class="text">
                        680-699
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="640-679">
                    <div class="text">
                        640-679
                    </div>
                </a>
                <a href="#next" class="btn-type btn-answer" data-value="639 or lower">
                    <div class="text">
                        639 <br> or lower
                    </div>
                </a>
                <input id="credit_score" class="answer" name="credit_score" type="hidden">
            </div>
        </section>
        <h3 hidden>Finish</h3>
        <section hidden>
            <h4>Ready to get preapproved?</h4>
            <div class="pmf_error" ></div>
            <div class="pmf_success">
                <img alt="" class="icon" height="100" src="<?php print $images_path; ?>sended.png" width="100">
                Your form has been successfully submitted!
            </div>
            <div class="data-client-container">
                <input id="client_name" placeholder="Full Name" name="client_name" type="text">
                <input id="client_phone" placeholder="Phone Number" name="client_phone" type="text">
                <input id="client_email" placeholder="Email" name="client_email" type="text">
                <button type="submit" id="btn-submit" class="btn-continue">
                    Submit Quote Request
                </button>
            </div>
        </section>
    </div>
</form>