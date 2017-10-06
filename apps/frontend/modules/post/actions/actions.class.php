<?php

/**
 * post actions.
 *
 * @package    sf_sandbox
 * @subpackage post
 * @author     Your name here
 */
class postActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_post_list = BlogPostPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->blog_post);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogPostForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogPostForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogPostForm($blog_post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogPostForm($blog_post);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $blog_post->delete();

    $this->redirect('post/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_post = $form->save();

      $this->redirect('post/edit?id='.$blog_post->getId());
    }
  }
}
