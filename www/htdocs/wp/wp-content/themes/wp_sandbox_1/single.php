<?php get_header(); ?>

<div class="l_container_1">

<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
?>

<article id="article" <?php post_class('article_1'); ?>>
  
  <header class="header_1">
    <h1 class="header_1__h1">
      <?php the_title(); ?>
    </h1>
  </header>
  
  <div class="div_1">
    <table class="table_1">
      <tbody class="table_1__tbody">
        <tr id="age" class="table_1__tr">
          <th class="table_1__th">
            年齢
          </th>
          <td class="table_1__td">
            <label><input type="radio" value="0_10" v-model="age"> 0〜10</label>
            <label><input type="radio" value="11_20" v-model="age"> 11〜20</label>
            <label><input type="radio" value="21_30" v-model="age"> 21〜30</label>
            <label><input type="radio" value="31_40" v-model="age"> 31〜40</label>
            <label><input type="radio" value="41_50" v-model="age"> 41〜50</label>
            <label><input type="radio" value="51_60" v-model="age"> 51〜60</label>
            <label><input type="radio" value="61_70" v-model="age"> 61〜70</label>
            <label><input type="radio" value="71_80" v-model="age"> 71〜80</label>
            <label><input type="radio" value="81_90" v-model="age"> 81〜90</label>
            <label><input type="radio" value="91_100" v-model="age"> 91〜100</label>
            <label><input type="radio" value="101" v-model="age"> 101以上</label>
          </td>
        </tr>
        <tr id="sex" class="table_1__tr">
          <th class="table_1__th">
            性別
          </th>
          <td class="table_1__td">
            <label><input type="radio" value="男" v-model="sex"> 男</label>
            <label><input type="radio" value="女" v-model="sex"> 女</label>
            <label><input type="radio" value="その他" v-model="sex"> その他</label>
          </td>
        </tr>
        <tr id="hobby" class="table_1__tr">
          <th class="table_1__th">
            趣味
          </th>
          <td class="table_1__td">
            <label><input type="checkbox" value="ゲーム" v-model="hobby"> ゲーム</label>
            <label><input type="checkbox" value="音楽" v-model="hobby"> 音楽</label>
            <label><input type="checkbox" value="山登り" v-model="hobby"> 山登り</label>
          </td>
        </tr>
      </tbody>
    </table><!-- /.table_1 -->
  </div><!-- /.div_1 -->
  
  <hr>
  
  <ul>
    <li>{{ age }}</li>
    <li>{{ sex }}</li>
    <li>{{ hobby }}</li>
  </ul>
  
  <hr>
  
  single.php
  
  <table class="table_2">
    <thead class="table_2__thead">
      <tr class="table_2__tr">
        <th class="table_2__th">
          名前
        </th>
        <td class="table_2__td">
          年齢
        </td>
        <td class="table_2__td">
          性別
        </td>
        <td class="table_2__td">
          趣味
        </td>
      </tr>
    </thead>
    <tbody class="table_2__tbody">
      <?php
      $members = get_field('member');
      //var_dump( $members );
      foreach ( $members as $member ) :
      ?>
      <template v-if="sex === '<?php echo $member['sex']; ?>'">
        <tr class="table_2__tr">
          <th class="table_2__th">
            <?php echo $member['name']; ?>
          </th>
          <td class="table_2__td">
            <?php echo $member['age']; ?>
          </td>
          <td class="table_2__td">
            <?php echo $member['sex']; ?>
          </td>
          <td class="table_2__td">
            <?php
            foreach ( $member['hobby'] as $hobby ) :
              echo $hobby . " ";
            endforeach;
            ?>
          </td>
        </tr>
      </template>
      <?php
      endforeach;
      ?>
    </tbody>
  </table><!-- /.table_2 -->
  
  <?php
    endwhile;
  else :
    get_template_part('none');
  endif;
  ?>
  
</article><!-- /.article_1 -->

</div><!-- /.l_container_1 -->

<?php get_footer();
