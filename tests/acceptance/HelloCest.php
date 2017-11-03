<?php


class HelloCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->sendAjaxGetRequest('/hello');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('hello world');
    }
}
