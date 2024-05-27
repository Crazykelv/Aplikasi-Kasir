<?php

// app/Helpers/FPGrowth.php
namespace App\Helpers;

class FPGrowth
{
    protected $transactions;
    protected $minSupport;
    protected $headerTable;
    protected $fpTree;

    public function __construct($transactions, $minSupport)
    {
        $this->transactions = $transactions;
        $this->minSupport = $minSupport;
        $this->headerTable = [];
        $this->fpTree = $this->buildFPTree($transactions);
    }

    protected function buildFPTree($transactions)
    {
        $itemCount = [];

        foreach ($transactions as $transaction) {
            foreach ($transaction as $item) {
                if (!isset($itemCount[$item])) {
                    $itemCount[$item] = 0;
                }
                $itemCount[$item]++;
            }
        }

        $itemCount = array_filter($itemCount, function ($count) {
            return $count >= $this->minSupport;
        });

        uasort($itemCount, function ($a, $b) {
            return $b - $a;
        });

        $this->headerTable = array_keys($itemCount);
        $tree = new FPTreeNode(null, null);

        foreach ($transactions as $transaction) {
            $sortedTransaction = array_filter($transaction, function ($item) use ($itemCount) {
                return isset($itemCount[$item]);
            });

            usort($sortedTransaction, function ($a, $b) use ($itemCount) {
                return $itemCount[$b] - $itemCount[$a];
            });

            $this->insertTransaction($tree, $sortedTransaction);
        }

        return $tree;
    }

    protected function insertTransaction($node, $transaction)
    {
        if (count($transaction) == 0) {
            return;
        }

        $firstItem = $transaction[0];
        $childNode = $node->getChild($firstItem);

        if ($childNode === null) {
            $childNode = new FPTreeNode($firstItem, $node);
            $node->addChild($childNode);
        }

        $childNode->incrementCount();
        $this->insertTransaction($childNode, array_slice($transaction, 1));
    }

    public function minePatterns()
    {
        return $this->mineSubTree($this->fpTree, []);
    }

    protected function mineSubTree($node, $suffix)
    {
        $patterns = [];

        foreach ($node->children as $child) {
            $newSuffix = array_merge([$child->item], $suffix);
            $patterns[] = $newSuffix;

            $patterns = array_merge($patterns, $this->mineSubTree($child, $newSuffix));
        }

        return $patterns;
    }
}

class FPTreeNode
{
    public $item;
    public $count;
    public $parent;
    public $children;

    public function __construct($item, $parent)
    {
        $this->item = $item;
        $this->count = 0;
        $this->parent = $parent;
        $this->children = [];
    }

    public function getChild($item)
    {
        foreach ($this->children as $child) {
            if ($child->item == $item) {
                return $child;
            }
        }

        return null;
    }

    public function addChild($child)
    {
        $this->children[] = $child;
    }

    public function incrementCount()
    {
        $this->count++;
    }
}
