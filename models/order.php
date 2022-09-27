<?php

class order
{
    private int $id;
    private ?string $comments;
    private ?DateTime $shipdate_expected;

    public function __construct(int $id = 0, ?string $comments = null, $shipdate_expected = null)
    {
        $this->id = $id;
        $this->comments = $comments;
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
    public function getComments() : ?string
    {
        return $this->comments;
    }

    /**
     * @return ?DateTime
     */
    public function getShipdateExpected() : ?DateTime
    {
        return $this->shipdate_expected;
    }

    /**
     * @param ?string $comments
     */
    public function setComments(?string $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param ?DateTime $shipdate_expected
     */
    public function setShipdateExpected(?DateTime $shipdate_expected)
    {
        $this->shipdate_expected = $shipdate_expected;
    }
}