<?php

namespace PHPNative\Ui;

use PHPNative\Event\Event;
use PHPNative\Event\EventType;

abstract class Window implements WindowInterface
{

    private WidgetCollection $widgetCollection;

    public function __construct(public int $width, public int $height,
                                public int $x, public int $y, public string $title,
                                public string $style)
    {
        $this->widgetCollection = new WidgetCollection([]);
        $this->init();
    }

    public function addWidget(WidgetInterface $widget): self {
        $this->widgetCollection->add($widget);
        return $this;
    }
}