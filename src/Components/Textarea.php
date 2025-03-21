<?php

namespace Galahad\Aire\Components;

use Galahad\Aire\Elements\Textarea as TextareaElement; 

class Textarea extends ElementComponent
{
	public function __construct(
		?bool $autoSize = null,
		?bool $autoFocus = null,
		$cols = null,
		$dirName = null,
		?bool $disabled = null,
		$form = null,
		$maxLength = null,
		$name = null,
		$placeholder = null,
		?bool $readOnly = null,
		?bool $required = null,
		$rows = null,
		$wrap = null,
		?array $data = null,
		$addClass = null,
		$removeClass = null,
		$accessKey = null,
		$class = null,
		?bool $contentEditable = null,
		$contextMenu = null,
		$dir = null,
		$draggable = null,
		$dropZone = null,
		?bool $hide = null,
		$id = null,
		$lang = null,
		$role = null,
		?bool $spellCheck = null,
		$style = null,
		$tabIndex = null,
		$title = null,
		$ariaActiveDescendant = null,
		?bool $ariaAtomic = null,
		?bool $ariaBusy = null,
		$ariaControls = null,
		$ariaDescribedBy = null,
		$ariaDisabled = null,
		$ariaDropEffect = null,
		$ariaFlowTo = null,
		$ariaGrabbed = null,
		?bool $ariaHasPopup = null,
		?bool $ariaHidden = null,
		$ariaInvalid = null,
		$ariaLabel = null,
		$ariaLabelledBy = null,
		$ariaLive = null,
		$ariaOwns = null,
		$ariaRelevant = null,
		?bool $grouped = null,
		?bool $withoutGroup = null,
		$variant = null,
		?string $variants = null,
		$defaultValue = null,
		$value = null,
		?string $label = null,
		?string $helpText = null,
		?string $infoText = null,
		$validated = null,
		$valid = null,
		$invalid = null,
		$errors = null,
		?string $prepend = null,
		?string $append = null,
		$groupData = null,
		$groupAccessKey = null,
		$groupClass = null,
		?bool $groupContentEditable = null,
		$groupContextMenu = null,
		$groupDir = null,
		$groupDraggable = null,
		$groupDropZone = null,
		?bool $groupHide = null,
		$groupId = null,
		$groupLang = null,
		$groupRole = null,
		?bool $groupSpellCheck = null,
		$groupStyle = null,
		$groupTabIndex = null,
		$groupTitle = null,
		$groupAriaActiveDescendant = null,
		?bool $groupAriaAtomic = null,
		?bool $groupAriaBusy = null,
		$groupAriaControls = null,
		$groupAriaDescribedBy = null,
		$groupAriaDisabled = null,
		$groupAriaDropEffect = null,
		$groupAriaFlowTo = null,
		$groupAriaGrabbed = null,
		?bool $groupAriaHasPopup = null,
		?bool $groupAriaHidden = null,
		$groupAriaInvalid = null,
		$groupAriaLabel = null,
		$groupAriaLabelledBy = null,
		$groupAriaLive = null,
		$groupAriaOwns = null,
		$groupAriaRelevant = null,
		$groupAddClass = null,
		$groupRemoveClass = null
	) {
		$this->createElement(TextareaElement::class, compact(
			'autoSize',
			'autoFocus',
			'cols',
			'dirName',
			'disabled',
			'form',
			'maxLength',
			'name',
			'placeholder',
			'readOnly',
			'required',
			'rows',
			'wrap',
			'data',
			'addClass',
			'removeClass',
			'accessKey',
			'class',
			'contentEditable',
			'contextMenu',
			'dir',
			'draggable',
			'dropZone',
			'hide',
			'id',
			'lang',
			'role',
			'spellCheck',
			'style',
			'tabIndex',
			'title',
			'ariaActiveDescendant',
			'ariaAtomic',
			'ariaBusy',
			'ariaControls',
			'ariaDescribedBy',
			'ariaDisabled',
			'ariaDropEffect',
			'ariaFlowTo',
			'ariaGrabbed',
			'ariaHasPopup',
			'ariaHidden',
			'ariaInvalid',
			'ariaLabel',
			'ariaLabelledBy',
			'ariaLive',
			'ariaOwns',
			'ariaRelevant',
			'grouped',
			'withoutGroup',
			'variant',
			'variants',
			'defaultValue',
			'value',
			'label',
			'helpText',
			'infoText',
			'validated',
			'valid',
			'invalid',
			'errors',
			'prepend',
			'append',
			'groupData',
			'groupAccessKey',
			'groupClass',
			'groupContentEditable',
			'groupContextMenu',
			'groupDir',
			'groupDraggable',
			'groupDropZone',
			'groupHide',
			'groupId',
			'groupLang',
			'groupRole',
			'groupSpellCheck',
			'groupStyle',
			'groupTabIndex',
			'groupTitle',
			'groupAriaActiveDescendant',
			'groupAriaAtomic',
			'groupAriaBusy',
			'groupAriaControls',
			'groupAriaDescribedBy',
			'groupAriaDisabled',
			'groupAriaDropEffect',
			'groupAriaFlowTo',
			'groupAriaGrabbed',
			'groupAriaHasPopup',
			'groupAriaHidden',
			'groupAriaInvalid',
			'groupAriaLabel',
			'groupAriaLabelledBy',
			'groupAriaLive',
			'groupAriaOwns',
			'groupAriaRelevant',
			'groupAddClass',
			'groupRemoveClass'
		));
	}
}
