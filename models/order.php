<?php

class order
{
    private int $id;
    private ?string $comment;
    private ?DateTime $shipdate_expected;

    public function __construct(int $id = 0, ?string $comment = null, $shipdate_expected = null)
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->shipdate_expected = $shipdate_expected;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return ?string
     */
    public function getComment() : ?string
    {
        return $this->comment;
    }

    /**
     * @return ?DateTime
     */
    public function getShipdateExpected() : ?DateTime
    {
        return $this->shipdate_expected;
    }

    /**
     * @param ?string $comment
     */
    public function setComment(?string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param ?DateTime $shipdate_expected
     */
    public function setShipdateExpected(?DateTime $shipdate_expected)
    {
        $this->shipdate_expected = $shipdate_expected;
    }
}