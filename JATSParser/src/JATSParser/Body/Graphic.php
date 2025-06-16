<?php

namespace JATSParser\Body;

use JATSParser\Body\Document as Document;

class Graphic extends AbstractElement
{

	/* @var $link string */
	private $link;

	/* @var $title string */
	private $title;

	/* @var $id string */
	private $id;

	/* @var $content array */
	private $content;

	public function __construct(\DOMElement $inlineGraphicElement)
	{
		parent::__construct($inlineGraphicElement);
		$this->id = $this->extractFromElement("./@id", $inlineGraphicElement);
		$this->link = $this->extractFromElement("./@xlink:href", $inlineGraphicElement);
		$this->title = $this->extractFromElement("./@xlink:title", $inlineGraphicElement);
		$this->content = $this->extractTitleOrCaption($inlineGraphicElement, self::JATS_EXTRACT_CAPTION);
	}

	public function getId(): ?string
	{
		return $this->id;
	}

	public function getContent(): ?array
	{
		return $this->content;
	}

	public function getLink(): ?string
	{
		return $this->link;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}
}
