<?php 

class SigninCest
{


    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
	$I->see('Вход');
    }

    public function signInWrongMailAndPass(AcceptanceTester $I)
    {	
	$I->fillField(['id'=>'login-email'], 'wrong@email.com');
	$I->fillField(['id'=>'password'], 'wrongpass');	
	$I->click(['class'=>'login-btns']);
	$I->see('Невалидни данни за достъп. Грешен E-mail или парола.');
    }

	//correct pass needed
    public function signInWrongMail(AcceptanceTester $I)
    {	
	$I->fillField(['id'=>'login-email'], 'wrong@email.com');
	$I->fillField(['id'=>'password'], 'correctPass');	
	$I->click(['class'=>'login-btns']);
	$I->see('Невалидни данни за достъп. Грешен E-mail или парола.');
    }
	
	//correct mail needed
    public function signInWrongPass(AcceptanceTester $I)
    {
	$I->fillField(['id'=>'login-email'], 'correct@email.com');
	$I->fillField(['id'=>'password'], 'wrongPass');	
	$I->click(['class'=>'login-btns']);
	$I->see('Невалидни данни за достъп. Грешен E-mail или парола.');
    }

    public function signInEmpty(AcceptanceTester $I)
    {	
	$I->click(['class'=>'login-btns']);
	$I->see('Полето е задължително.');
    }

    public function signInEmptyMail(AcceptanceTester $I)
    {	
	$I->fillField(['id'=>'password'], 'correctPass');
	$I->click(['class'=>'login-btns']);
	$I->see('Полето е задължително.');
    }

    public function signInEmptyPass(AcceptanceTester $I)
    {	
	$I->fillField(['id'=>'login-email'], 'correct@email.com');
	$I->click(['class'=>'login-btns']);
	$I->see('Вход');
    }
    
    public function signInForggotenPass(AcceptanceTester $I)
    {	
	$I->click(['link'=>'Забравена парола?']);
	$I->see('Забравена парола');
    }
    
    public function signInRegNow(AcceptanceTester $I)
    {	
	$I->click(['link'=>'Регистрирайте се сега']);
	$I->see('Регистрация');
    }

    public function signInFacebook(AcceptanceTester $I)
    {	
	$I->click(['link'=>'Log in with Facebook']);
	$I->see('Facebook');
    }

}

