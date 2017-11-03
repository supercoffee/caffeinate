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
        $I->sendGET('/hello', ['name' => 'Ben']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('hello Ben');
    }

    public function stripsHtmlTags(AcceptanceTester $I)
    {
        $I->sendGET('/hello', ['name' => '</b>Ben</b>']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('hello Ben');
    }
}
