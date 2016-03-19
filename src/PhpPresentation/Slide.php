<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPPresentation
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpPresentation;

use PhpOffice\PhpPresentation\Shape\Chart;
use PhpOffice\PhpPresentation\Shape\RichText;
use PhpOffice\PhpPresentation\Shape\Table;
use PhpOffice\PhpPresentation\Slide\AbstractBackground;
use PhpOffice\PhpPresentation\Slide\AbstractSlide;
use PhpOffice\PhpPresentation\Slide\Layout;
use PhpOffice\PhpPresentation\Slide\Note;
use PhpOffice\PhpPresentation\Slide\Transition;

/**
 * Slide class
 */
class Slide extends AbstractSlide implements ComparableInterface, ShapeContainerInterface
{


    /**
     * Slide layout
     *
     * @var string
     */
    private $slideLayout;

    /**
     * Slide master id
     *
     * @var integer
     */
    private $slideMasterId = 1;

    /**
     *
     * @var \PhpOffice\PhpPresentation\Slide\Note
     */
    private $slideNote;


    /**
     * Name of the title
     *
     * @var string
     */
    protected $name;


    /**
     * Create a new slide
     *
     * @param PhpPresentation $pParent
     */
    public function __construct(PhpPresentation $pParent = null)
    {
        // Set parent
        $this->parent = $pParent;

        $this->slideLayout = Slide\Layout::BLANK;

        // Shape collection
        $this->shapeCollection = new \ArrayObject();

        // Set identifier
        $this->identifier = md5(rand(0, 9999) . time());
    }


    /**
     * Get slide layout
     *
     * @return string
     */
    public function getSlideLayout()
    {
        return $this->slideLayout;
    }

    /**
     * Set slide layout
     *
     * @param  string              $layout
     * @return \PhpOffice\PhpPresentation\Slide
     */
    public function setSlideLayout($layout = Layout::BLANK)
    {
        $this->slideLayout = $layout;

        return $this;
    }

    /**
     * Get slide master id
     *
     * @return int
     */
    public function getSlideMasterId()
    {
        return $this->slideMasterId;
    }

    /**
     * Set slide master id
     *
     * @param  int                 $masterId
     * @return \PhpOffice\PhpPresentation\Slide
     */
    public function setSlideMasterId($masterId = 1)
    {
        $this->slideMasterId = $masterId;

        return $this;
    }


    /**
     * Copy slide (!= clone!)
     *
     * @return \PhpOffice\PhpPresentation\Slide
     */
    public function copy()
    {
        $copied = clone $this;

        return $copied;
    }


    /**
     *
     * @return \PhpOffice\PhpPresentation\Slide\Note
     */
    public function getNote()
    {
        if (is_null($this->slideNote)) {
            $this->setNote();
        }
        return $this->slideNote;
    }

    /**
     *
     * @param \PhpOffice\PhpPresentation\Slide\Note $note
     * @return \PhpOffice\PhpPresentation\Slide
     */
    public function setNote(Note $note = null)
    {
        $this->slideNote = (is_null($note) ? new Note() : $note);
        $this->slideNote->setParent($this);

        return $this;
    }


    /**
     * Get the name of the slide
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the slide
     * @param string $name
     * @return $this
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
}
