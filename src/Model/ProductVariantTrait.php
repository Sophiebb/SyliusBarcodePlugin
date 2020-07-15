<?php

declare(strict_types=1);

namespace Loevgaard\SyliusBarcodePlugin\Model;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait ProductVariantTrait
{
    /**
     * @ORM\Column(type="string", name="barcode", nullable=true)
     *
     * @var string|null
     */
    protected $barcode;

    /**
     * The date where the barcode was checked
     *
     * @ORM\Column(type="datetime", name="barcode_checked", nullable=true)
     *
     * @var DateTimeInterface|null
     */
    protected $barcodeChecked;

    /**
     * @ORM\Column(type="boolean", name="barcode_valid", nullable=true)
     *
     * @var bool
     */
    protected $barcodeValid = false;

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
    }

    public function isBarcodeChecked(): bool
    {
        return $this->barcodeChecked instanceof DateTimeInterface;
    }

    public function getBarcodeChecked(): ?DateTimeInterface
    {
        return $this->barcodeChecked;
    }

    public function setBarcodeChecked(?DateTimeInterface $barcodeChecked): void
    {
        $this->barcodeChecked = $barcodeChecked;
    }

    public function isBarcodeValid(): bool
    {
        return $this->barcodeValid;
    }

    public function setBarcodeValid(bool $barcodeValid): void
    {
        $this->barcodeValid = $barcodeValid;
    }

    public function markBarcodeAsChecked(bool $valid): void
    {
        $this->barcodeChecked = new DateTime();
        $this->barcodeValid = $valid;
    }
}
