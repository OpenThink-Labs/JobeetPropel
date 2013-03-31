<?php
/**
 * affiliate actions.
 *
 * @package    jobeet
 * @subpackage affiliate
 * @author     Wildan Maulana, OpenThink Labs
 */
class affiliateActions extends sfActions
{

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetAffiliateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new JobeetAffiliateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $JobeetAffiliate = $form->save();

      $this->redirect($this->generateUrl('affiliate_wait', $jobeet_affiliate));
    }
  }
  
  public function executeWait(sfWebRequest $request)
  {
  }  
}
