<?php
class Note
{
    private $id;
    private $name;
    private $note1;
    private $note2;
    private $average;

    
    public function __construct($id, $name, $note1, $note2, $average)
    {
        $this->id = $id;
        $this->name = $name;
        $this->note1 = $note1;
        $this->note2 = $note2;
        $this->average = $average;
    }




    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of note1
     */
    public function getNote1()
    {
        return $this->note1;
    }

    /**
     * Set the value of note1
     *
     * @return  self
     */
    public function setNote1($note1)
    {
        $this->note1 = $note1;

        return $this;
    }

    /**
     * Get the value of note2
     */
    public function getNote2()
    {
        return $this->note2;
    }

    /**
     * Set the value of note2
     *
     * @return  self
     */
    public function setNote2($note2)
    {
        $this->note2 = $note2;

        return $this;
    }

    /**
     * Get the value of average
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * Set the value of average
     *
     * @return  self
     */
    public function setAverage($average)
    {
        $this->average = $average;

        return $this;
    }
}
