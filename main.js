function screenChange(){
    pullSellect = document.pullForm.pullMenu.selectedIndex ;
    /**selectedIndexは要素内にある要素に配列を[0]から与える*/
    location.href = document.pullForm.pullMenu.options[pullSellect].value ;
    /**要素内にある要素内を参照するoptionsに格納する。*/
}
