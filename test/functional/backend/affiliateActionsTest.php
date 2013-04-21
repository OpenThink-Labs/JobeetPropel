<?php

// test/functional/backend/affiliateActionsTest.php
include(dirname(__FILE__).'/../../bootstrap/functional.php');
 
$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();
 
$browser->
  info('1 - Authentication')->
  get('/affiliate')->
  click('Signin', array(
    'signin' => array('username' => 'wildan.m', 'password' => 'admin'),
    array('_with_csrf' => true)
  ))->
  with('response')->isRedirected()->
  followRedirect()->
 
  info('2 - When validating an affiliate, an email must be sent with its token')->
  click('Activate', array(), array('position' => 1))->
  with('mailer')->begin()->
    checkHeader('Subject', '/Amanah affiliate token/')->
    checkBody('/Your token is symfony/')->
  end()
;