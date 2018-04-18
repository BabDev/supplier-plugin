<?php

/*
 * This file is part of the BabDevSupplierPlugin package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BabDev\SupplierPlugin\Tests\Behat\Context\Ui\Admin;

use BabDev\SupplierPlugin\Model\Supplier;
use BabDev\SupplierPlugin\Tests\Behat\Page\Admin\Supplier\CreatePageInterface;
use BabDev\SupplierPlugin\Tests\Behat\Page\Admin\Supplier\UpdatePageInterface;
use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Admin\Crud\IndexPageInterface;
use Webmozart\Assert\Assert;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class ManagingSuppliersContext implements Context
{
    /**
     * @var IndexPageInterface
     */
    private $indexPage;

    /**
     * @var CreatePageInterface
     */
    private $createPage;

    /**
     * @var UpdatePageInterface
     */
    private $updatePage;

    /**
     * @param IndexPageInterface $indexPage
     * @param CreatePageInterface $createPage
     * @param UpdatePageInterface $updatePage
     */
    public function __construct(
        IndexPageInterface $indexPage,
        CreatePageInterface $createPage,
        UpdatePageInterface $updatePage
    ) {
        $this->indexPage = $indexPage;
        $this->createPage = $createPage;
        $this->updatePage = $updatePage;
    }

    /**
     * @Given I want to create a new supplier
     * @Given I want to add a new supplier
     */
    public function iWantToCreateNewSupplier()
    {
        $this->createPage->open();
    }

    /**
     * @When I want to browse suppliers of the store
     */
    public function iWantToBrowseSuppliersOfTheStore()
    {
        $this->indexPage->open();
    }

    /**
     * @When I specify its code as :code
     */
    public function iSpecifyItsCodeAs($code)
    {
        $this->createPage->setCode($code);
    }

    /**
     * @When I set its name to :name
     */
    public function iSetItsNameTo($name)
    {
        $this->createPage->setName($name);
    }

    /**
     * @When I set its description to :description
     */
    public function iSetItsDescriptionTo($description)
    {
        $this->createPage->setDescription($description);
    }

    /**
     * @When I set its contact email to :contactEmail
     */
    public function iSetItsContactEmailAs($contactEmail)
    {
        $this->createPage->setContactEmail($contactEmail);
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt()
    {
        $this->createPage->create();
    }

    /**
     * @Then /^I should be notified that (name|description) is required$/
     */
    public function iShouldBeNotifiedThatElementIsRequired($element)
    {
        Assert::same(
            $this->createPage->getValidationMessage($element),
            'This value should not be blank.'
        );
    }

    /**
     * @Then the supplier :name should appear in the store
     * @Then I should see the supplier :name in the list
     */
    public function theSupplierShouldAppearInTheStore($name)
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::true($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Then I should see :amount suppliers in the list
     */
    public function iShouldSeeThatManySuppliersInTheList($amount)
    {
        Assert::same(
            (int) $amount,
            $this->indexPage->countItems(),
            'Amount of suppliers should be equal %s, but was %2$s.'
        );
    }

    /**
     * @Then the supplier :name should not be added
     */
    public function theSupplierShouldNotBeAdded($name)
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Given /^I want to edit (this supplier)$/
     */
    public function iWantToEditThisSupplier(Supplier $supplier)
    {
        $this->updatePage->open(['id' => $supplier->getId()]);
    }

    /**
     * @When I change its description to :description
     */
    public function iChangeItsDescriptionTo($description)
    {
        $this->updatePage->changeDescriptionTo($description);
    }

    /**
     * @When I save my changes
     * @When I try to save my changes
     */
    public function iSaveMyChanges()
    {
        $this->updatePage->saveChanges();
    }

    /**
     * @When I delete supplier :name
     */
    public function iDeleteSupplier($name)
    {
        $this->indexPage->open();
        $this->indexPage->deleteResourceOnPage(['name' => $name]);
    }

    /**
     * @Then /^(this supplier) should have description "([^"]+)"$/
     */
    public function thisStaticContentShouldHaveBody(Supplier $supplier, $description)
    {
        $this->updatePage->open(['id' => $supplier->getId()]);
        Assert::same($this->updatePage->getDescription(), $description);
    }

    /**
     * @Then the supplier :name should no longer exist in the store
     */
    public function theSupplierShouldNoLongerExistInTheStore($name)
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }
}
