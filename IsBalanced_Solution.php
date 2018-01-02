<?php
//输入一棵二叉树，判断该二叉树是否是平衡二叉树。

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

function IsBalanced_Solution($pRoot)
{
    // write code here
    $flag = true;
    TreeDepth($pRoot,$flag);
    return $flag;
}

function TreeDepth($pRoot, &$flag)
{
    if ($pRoot == NULL)
        return 0;
    $l = TreeDepth($pRoot->left,$flag);
    $r = TreeDepth($pRoot->right,$flag);
    if (abs($l - $r) > 1) {
        $flag = false;
    }
    return max($l + 1, $r + 1);
}