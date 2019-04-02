<?php

class pluginAtomFeed extends Plugin {

	public function init()
	{
		// Fields and default values for the database of this plugin
		$this->dbFields = array(
			'atomFeedCopyright' => '',
			'atomFeedFile' => 'feed.atom',
			'atomFeedGenerator' => 'Bludit - Flat-File CMS',
			'atomFeedItemLimit' => 10
		);
	}

	// Method called on the settings of the plugin on the admin area
	public function form()
	{
		global $L;

		// Atom Feed Copyright
		$atomFeedCopyright = $this->getValue('atomFeedCopyright');
		// Atom Feed File
		$atomFeedFile = $this->getValue('atomFeedFile');
		// Atom Feed Generator
		$atomFeedGenerator = $this->getValue('atomFeedGenerator');
		// Atom Feed Item Limit
		$atomFeedItemLimit = $this->getValue('atomFeedItemLimit');
		// Atom Feed URL
		$atomFeedURL = DOMAIN_BASE.$atomFeedFile;

		$html  = '<div class="alert alert-primary" role="alert">';
		$html .= $this->description();
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('atom-feed-url').'</label>';
		$html .= '<a href="'.$atomFeedURL.'">'.$atomFeedURL.'</a>';
		$html .= '<span class="tip">'.$L->get('atom-feed-url-tip').'</span>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('atom-feed-item-limit').'</label>';
		$html .= '<input id="jsatomFeedItemLimit" name="atomFeedItemLimit" type="number" title="Valid input range: -1 - 100" min="-1" max="100" value="'.$atomFeedItemLimit.'">';
		$html .= '<span class="tip">'.$L->get('atom-feed-item-limit-tip').'</span>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('atom-feed-copyright').'</label>';
		$html .= '<select id="jsatomFeedCopyright" name="atomFeedCopyright">';

		if (!empty($atomFeedCopyright)) {
			$html .= '<option value="'.$atomFeedCopyright.'">'.$atomFeedCopyright.'</option>';
		} else {
			$html .= '<option value="DISABLE">DISABLE</option>';
		}

		$html .= '<option value="CC BY 4.0">CC BY 4.0</option>';
		$html .= '<option value="CC BY-SA 4.0">CC BY-SA 4.0</option>';
		$html .= '<option value="CC BY-ND 4.0">CC BY-ND 4.0</option>';
		$html .= '<option value="CC BY-NC 4.0">CC BY-NC 4.0</option>';
		$html .= '<option value="CC BY-NC-SA 4.0">CC BY-NC-SA 4.0</option>';
		$html .= '<option value="CC BY-NC-ND 4.0">CC BY-NC-ND 4.0</option>';
		$html .= '<option value="DISABLE">DISABLE</option>';
		$html .= '</select>';

		if (!empty($atomFeedCopyright)) {
			$html .= '<span class="tip">'.$L->get('atom-feed-copyright-tip').$atomFeedCopyright.'</span>';
		} else {
			$html .= '<span class="tip">'.$L->get('atom-feed-copyright-tip').'DISABLE</span>';
		}
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('atom-feed-generator').'</label>';
		$html .= '<input id="jsatomFeedGenerator" name="atomFeedGenerator" pattern="[a-zA-ZÀ-ž0-9-_. !]+" title="Valid: !, -, _, ., a-z, A-Z, À-ž, 0-9" maxlength="50" type="text" value="'.$atomFeedGenerator.'">';
		$html .= '<span class="tip">'.$L->get('atom-feed-generator-tip').'</span>';
		$html .= '</div>';

		return $html;
	}

	private function createXML()
	{
		global $site;
		global $pages;
		global $url;

		// Atom Feed Copyright
		$atomFeedCopyright = $this->getValue('atomFeedCopyright');
		// Atom Feed File
		$atomFeedFile = $this->getValue('atomFeedFile');
		// Atom Feed Generator
		$atomFeedGenerator = $this->getValue('atomFeedGenerator');
		// Amount of pages to show
		$atomFeedItemLimit = $this->getValue('atomFeedItemLimit');
		// Atom Feed Subtitle
		$atomFeedSubtitle = $site->slogan();
		// ID Domain - used in atomFeedUUID
		$uuidDomain = parse_url(DOMAIN);
		// Atom Feed UUID - MUST be globally unique
		$atomFeedUUID = 'tag:'.$uuidDomain['host'].',2019-03-31:1640';

		// Get the list of published pages (sticky and static included)
		$list = $pages->getList(
			$pageNumber=1,
			$atomFeedItemLimit,
			$published=true,
			$static=true,
			$sticky=true,
			$draft=false,
			$scheduled=false
		);

		$xml = '<?xml version="1.0" encoding="utf-8" ?>';
		$xml .= '<feed xmlns="http://www.w3.org/2005/Atom">';
		$xml .= '<title>'.$site->title().'</title>';

		// Add subtitle
		if (!empty($atomFeedSubtitle)) {
			$xml .= '<subtitle>'.$site->slogan().'</subtitle>';
		}

		$xml .= '<id>'.$atomFeedUUID.'</id>';
		$xml .= '<updated>'.date(DATE_ATOM).'</updated>';
		$xml .= '<link href="'.DOMAIN_BASE.$atomFeedFile.'" rel="self" type="application/atom+xml" />';
		$xml .= '<link href="'.$site->domain().'" hreflang="'.Theme::lang().'" rel="alternate" type="text/html" />';

		// Add copyright
		if (!empty($atomFeedCopyright) && ($atomFeedCopyright !== 'DISABLE')) {
			$xml .= '<rights>'.$atomFeedCopyright.'</rights>';
		}

		// Add generator
		if (!empty($atomFeedGenerator)) {
			$xml .= '<generator>'.$atomFeedGenerator.'</generator>';
		}

		// Get keys of pages
		foreach ($list as $pageKey) {
			try {
				// Create the page object from the page key
				$page = new Page($pageKey);
				$xml .= '<entry>';
				$xml .= '<title>'.$page->title().'</title>';
				$xml .= '<link href="'.$page->permalink().'" hreflang="'.Theme::lang().'" rel="alternate" />';
				$xml .= '<id>'.$atomFeedUUID.'.'.$page->uuid().'</id>';
				$xml .= '<published>'.$page->date(DATE_ATOM).'</published>';

				// Better way to do this?
				if (!empty($page->dateModified())) {
					$dm = $page->dateModified();
					// Convert $dm to DATE_ATOM
					$dmatom = Date::format($dm, DB_DATE_FORMAT, DATE_ATOM);
					// Display DATE_ATOM
					$xml .= '<updated>'.$dmatom.'</updated>';
				} else {
					$xml .= '<updated>'.$page->date(DATE_ATOM).'</updated>';
				}

				// Add category
				if (!empty($page->category())) {
					$xml .= '<category scheme="'.DOMAIN_BASE.'" term="'.$page->category().'" />';
				}

				$xml .= '<author><name>'.$page->username().'</name></author>';
				$xml .= '<summary type="html">'.Sanitize::html($page->contentBreak()).'</summary>';
				$xml .= '</entry>';
			} catch (Exception $e) {
				// Continue
			}
		}

		$xml .= '</feed>';

		// New DOM document
		$doc = new DOMDocument();
		$doc->formatOutput = true;
		$doc->loadXML($xml);
		return $doc->save($this->workspace().$atomFeedFile);
	}

	public function install($position=0)
	{
		parent::install($position);
		return $this->createXML();
	}

	public function post()
	{
		parent::post();
		return $this->createXML();
	}

	public function afterPageCreate()
	{
		$this->createXML();
	}

	public function afterPageModify()
	{
		$this->createXML();
	}

	public function afterPageDelete()
	{
		$this->createXML();
	}

	public function siteHead()
	{
		global $site;

		return '<link rel="alternate" type="application/atom+xml" href="'.DOMAIN_BASE.$this->getValue('atomFeedFile').'" title="'.$site->title().' - Atom Feed">'.PHP_EOL;
	}

	public function beforeAll()
	{
		// Atom Feed File
		$atomFeedFile = $this->getValue('atomFeedFile');

		if ($this->webhook($atomFeedFile)) {
			// Send XML header
			header('Content-type: application/atom+xml');
			$doc = new DOMDocument();

			// Load XML
			libxml_disable_entity_loader(false);
			$doc->load($this->workspace().$atomFeedFile);
			libxml_disable_entity_loader(true);

			// Print the XML
			echo $doc->saveXML();

			// Stop Bludit execution
			exit(0);
		}
	}
}
