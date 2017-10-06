<?php

class BlogPost extends BaseBlogPost
{
	public function __toString()
  {
    return $this->getTitle();
  }
}
