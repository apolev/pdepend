<?php
/**
 * This file is part of PDepend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2013, Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @copyright 2008-2013 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 * @link       https://github.com/pdepend/pdepend/issues/100
 */

namespace PDepend\Bugs;
use PDepend\Source\AST\ASTArtifactList\CollectionArtifactFilter;
use PDepend\Source\AST\ASTArtifactList\PackageArtifactFilter;
use PDepend\Metrics\Analyzer\InheritanceAnalyzer;

/**
 * Test case issue 00000100.
 *
 * @copyright 2008-2013 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 * @link       https://github.com/pdepend/pdepend/issues/100
 *
 * @covers \stdClass
 * @group regressiontest
 */
class TraitsNotHandledCorrrectBug00000100Test extends AbstractRegressionTest
{
    /**
     * testHandlingOfSelfReferenceInTrait
     *
     * @return void
     */
    public function testHandlingOfSelfReferenceInTrait()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());
    }

    public function testHandlingConflictResolution()
    {
        $filter = CollectionArtifactFilter::getInstance();
        $filter->setFilter(new PackageArtifactFilter(array('library')));
        $namespaces = self::parseTestCaseSource(__METHOD__);
        $analyzer = new InheritanceAnalyzer();
        $analyzer->analyze($namespaces);
    }
}
