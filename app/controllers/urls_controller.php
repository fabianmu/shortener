<?php

class UrlsController extends AppController {

	var $name = 'Urls';
	var $components = array('RequestHandler');
	
	// enable Javascript to enable json output
	var $helpers = array('Javascript');
	
	function beforeFilter() {
		// set mime-type for json
		$this->RequestHandler->setContent('json', 'text/x-json');
	}
	
	
	function added($id) {
		$this->pageTitle = 'The URL has been shortened';
		
		$this->set('url', $this->Url->findById($id));
	}
	
	function add() {
		$this->pageTitle = 'Add new URL';
		
		if (!empty($this->data)) {
			
			$this->Url->set('short_url', $this->_genShortUrl());
			
			if ($this->Url->save($this->data)) {
				$this->Session->setFlash('Your url has been saved.');
				if ($this->params['url']['ext'] == 'xml') {
					$this->redirect(array('action' => 'added/' .  $this->Url->field('id') . ".xml"));
				} else {
					$this->redirect(array('action' => 'added/' .  $this->Url->field('id') ));
				}
			}
		}
	}
	
	function redirectToLongUrl($shortUrl) {
		$url = $this->Url->findByShortUrl($shortUrl);
		
		if ($url != null) {
			// increment hits
			$this->Url->id = $url['Url']['id'];
			$this->Url->set('hits', ($this->Url->field('hits') + 1) );
			$this->Url->save();
			
			$redirectToUrl = $this->Url->field('long_url');
			
			if ( substr($redirectToUrl, 0, 4) != 'http') {
				 $redirectToUrl = 'http://' . $redirectToUrl;
			}
			
			$this->redirect( $redirectToUrl );
		}
	}
	
	function hits() {
		$this->pageTitle = 'URL Hits';
		$this->set('urls', $this->Url->find('all'));
	}
	
	/**
	 * generates a new short url, based on random character.
	 *
	 * @author Fabian
	 */
	function _genShortUrl () {
		$validShortUrl = false;
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		
		while ($validShortUrl == false) {
			$shortUrl = str_shuffle(substr(str_shuffle($characters),0,6));
			
			// check if generated shortUrl is taken
			$url = $this->Url->findByShortUrl($shortUrl);
			if ($url == null) {
				return $shortUrl;
			}
		}
		
	}
	
}