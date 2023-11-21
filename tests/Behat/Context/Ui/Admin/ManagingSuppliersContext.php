<?php

/*
 * This file is part of the BabDevSyliusSupplierPlugin package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\BabDev\SyliusSupplierPlugin\Behat\Context\Ui\Admin;

use BabDev\SyliusSupplierPlugin\Model\SupplierInterface;
use Tests\BabDev\SyliusSupplierPlugin\Behat\Page\Admin\Supplier\CreatePageInterface;
use Tests\BabDev\SyliusSupplierPlugin\Behat\Page\Admin\Supplier\UpdatePageInterface;
use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Admin\Crud\IndexPageInterface;
use Webmozart\Assert\Assert;

final class ManagingSuppliersContext implements Context
{
    public function __construct(
        private IndexPageInterface $indexPage,
        private CreatePageInterface $createPage,
        private UpdatePageInterface $updatePage,
    ) {
    }

    /**
     * @Given I want to create a new supplier
     * @Given I want to add a new supplier
     */
    public function iWantToCreateNewSupplier(): void
    {
        $this->createPage->open();
    }

    /**
     * @When I want to browse suppliers of the store
     */
    public function iWantToBrowseSuppliersOfTheStore(): void
    {
        $this->indexPage->open();
    }

    /**
     * @When I specify its code as :code
     */
    public function iSpecifyItsCodeAs(string $code): void
    {
        $this->createPage->setCode($code);
    }

    /**
     * @When I set its name to :name
     */
    public function iSetItsNameTo(string $name): void
    {
        $this->createPage->setName($name);
    }

    /**
     * @When I set its description to :description
     */
    public function iSetItsDescriptionTo(string $description): void
    {
        $this->createPage->setDescription($description);
    }

    /**
     * @When I set its contact email to :contactEmail
     */
    public function iSetItsContactEmailAs(string $contactEmail): void
    {
        $this->createPage->setContactEmail($contactEmail);
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt(): void
    {
        $this->createPage->create();
    }

    /**
     * @When I delete them
     */
    public function iDeleteThem(): void
    {
        $this->indexPage->bulkDelete();
    }

    /**
     * @When I check (also) the :supplierName supplier
     */
    public function iCheckTheSupplier(string $supplierName): void
    {
        $this->indexPage->checkResourceOnPage(['name' => $supplierName]);
    }

    /**
     * @Then /^I should be notified that (name|description) is required$/
     */
    public function iShouldBeNotifiedThatElementIsRequired(string $element): void
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
    public function theSupplierShouldAppearInTheStore(string $name): void
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::true($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Then I should see a single supplier in the list
     * @Then I should see :amount suppliers in the list
     */
    public function iShouldSeeSuppliersInTheList(int $amount = 1): void
    {
        Assert::same($this->indexPage->countItems(), $amount);
    }

    /**
     * @Then the supplier :name should not be added
     */
    public function theSupplierShouldNotBeAdded(string $name): void
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Given /^I want to edit (this supplier)$/
     */
    public function iWantToEditThisSupplier(SupplierInterface $supplier): void
    {
        $this->updatePage->open(['id' => $supplier->getId()]);
    }

    /**
     * @When I change its description to :description
     */
    public function iChangeItsDescriptionTo(string $description): void
    {
        $this->updatePage->changeDescriptionTo($description);
    }

    /**
     * @When I save my changes
     * @When I try to save my changes
     */
    public function iSaveMyChanges(): void
    {
        $this->updatePage->saveChanges();
    }

    /**
     * @When I delete supplier :name
     */
    public function iDeleteSupplier(string $name): void
    {
        $this->indexPage->open();
        $this->indexPage->deleteResourceOnPage(['name' => $name]);
    }

    /**
     * @Then /^(this supplier) should have description "([^"]+)"$/
     */
    public function thisStaticContentShouldHaveBody(SupplierInterface $supplier, string $description): void
    {
        $this->updatePage->open(['id' => $supplier->getId()]);
        Assert::same($this->updatePage->getDescription(), $description);
    }

    /**
     * @Then the supplier :name should no longer exist in the store
     */
    public function theSupplierShouldNoLongerExistInTheStore(string $name): void
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }
}
