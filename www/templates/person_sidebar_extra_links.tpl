{* Smarty *}

<div class="sidemoduletitle">
  Alte legături
</div>

<ul class="identity_ul">
  <li class="identity_li small">
    <a href="http://www.google.ro/search?hl=ro&q={$name}&meta=lr%3Dlang_ro">
      Caută pe google "{$name}"
    </a>
  </li>

  <li class="identity_li small">
    <a href="https://ro.wikipedia.org/w/index.php?search={$name}&title=Special%3AC%C4%83utare">
      Caută pe Wikipedia
    </a>
  </li>

  <li class="identity_li small">
    <a href="javascript:togglePhotoSuggestForm();">
      <img src="images/plus.png" border=0> Propune o fotografie
    </a>
    {include file="person_add_a_photo.tpl"}
  </li>
</ul>

