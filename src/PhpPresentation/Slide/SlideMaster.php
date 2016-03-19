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

namespace PhpOffice\PhpPresentation\Slide;

use PhpOffice\PhpPresentation\ComparableInterface;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\ShapeContainerInterface;

class SlideMaster extends AbstractSlide implements ComparableInterface, ShapeContainerInterface
{
    /**
     * Collection of Slide objects
     *
     * @var \PhpOffice\PhpPresentation\Slide\SlideMaster[]
     */
    protected $slideMasters = array();


    /**
     * Create a new slideMaster
     *
     * @param PhpPresentation $pParent
     */
    public function __construct(PhpPresentation $pParent = null)
    {
        // Set parent
        $this->parent = $pParent;

        // Shape collection
        $this->shapeCollection = new \ArrayObject();

        // Set identifier
        $this->identifier = md5(rand(0, 9999) . time());
    }

    /**
     * Create a slideLayout and add it to this presentation
     *
     * @return \PhpOffice\PhpPresentation\Slide\SlideLayout
     */
    public function createSlideLayout()
    {
        $newSlideLayout = new SlideLayout($this);
        $this->addSlideLayout($newSlideLayout);
        return $newSlideLayout;
    }

    /**
     * Add slideLayout
     *
     * @param  \PhpOffice\PhpPresentation\Slide\SlideLayout $slide
     * @throws \Exception
     * @return \PhpOffice\PhpPresentation\Slide\SlideLayout
     */
    public function addSlideLayout(SlideLayout $slide = null)
    {
        $this->slideMasters[] = $slide;

        return $slide;
    }
}
