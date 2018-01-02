<?php
//输入一棵二叉树，求该树的深度。从根结点到叶结点依次经过的结点（含根、叶结点）形成树的一条路径，最长路径的长度为树的深度。

//class TreeNode{
//    var $val;
//    var $left = NULL;
//    var $right = NULL;
//    function __construct($val){
//        $this->val = $val;
//    }
//}

function TreeDepth($pRoot)
{
    if($pRoot == null)
        return 0;
    $l = TreeDepth($pRoot->left);
    $r = TreeDepth($pRoot->right);
    return $l > $r ? $l+1 : $r +1;
}