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

   /*public function signInAtSymbolMissing(AcceptanceTester $I)
    {	
	$I->fillField(['id'=>'login-email'], 'correctemail.com');
	$I->click(['class'=>'login-btns']);
	$I->seeResponseContainsJson(['error' => 'Please include an "@" in the email address']);
	$I->seeInPopup('Please include an "@" in the email address');
    }*/

}

