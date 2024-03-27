<?php

class Deque {
    private $maxSize;
    private $deque;
    private $front;
    private $back;
    private $size;

    public function __construct($maxSize) {
        $this->maxSize = $maxSize;
        $this->deque = array_fill(0, $maxSize, null);
        $this->front = 0;
        $this->back = 0;
        $this->size = 0;
    }

    public function pushBack($value) {
        if ($this->size == $this->maxSize) {
            return false;
        }
        $this->deque[$this->back] = $value;
        $this->back = ($this->back + 1) % $this->maxSize;
        $this->size++;
        return true;
    }

    public function pushFront($value) {
        if ($this->size == $this->maxSize) {
            return false;
        }
        $this->front = ($this->front - 1 + $this->maxSize) % $this->maxSize;
        $this->deque[$this->front] = $value;
        $this->size++;
        return true;
    }

    public function popBack() {
        if ($this->size == 0) {
            return false;
        }
        $value = $this->deque[$this->back];
        $this->back = ($this->back - 1 + $this->maxSize) % $this->maxSize;
        $this->size--;
        return $value;
    }

    public function popFront() {
        if ($this->size == 0) {
            return false;
        }
        $value = $this->deque[$this->front];
        $this->front = ($this->front + 1) % $this->maxSize;
        $this->size--;
        return $value;
    }
}
