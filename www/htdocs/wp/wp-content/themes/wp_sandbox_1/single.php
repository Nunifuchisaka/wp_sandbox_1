<?php get_header(); ?>

<div class="l_container_1">

<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article_1'); ?>>
  
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
            <label><input type="radio" name="age" value="0_10"> 0〜10</label>
            <label><input type="radio" name="age" value="11_20"> 11〜20</label>
            <label><input type="radio" name="age" value="21_30"> 21〜30</label>
            <label><input type="radio" name="age" value="31_40"> 31〜40</label>
            <label><input type="radio" name="age" value="41_50"> 41〜50</label>
            <label><input type="radio" name="age" value="51_60"> 51〜60</label>
            <label><input type="radio" name="age" value="61_70"> 61〜70</label>
            <label><input type="radio" name="age" value="71_80"> 71〜80</label>
            <label><input type="radio" name="age" value="81_90"> 81〜90</label>
            <label><input type="radio" name="age" value="91_100"> 91〜100</label>
            <label><input type="radio" name="age" value="101"> 101以上</label>
          </td>
        </tr>
        <tr id="sex" class="table_1__tr">
          <th class="table_1__th">
            性別
          </th>
          <td class="table_1__td">
            <label><input type="radio" name="sex" value="man"> 男</label>
            <label><input type="radio" name="sex" value="woman"> 女</label>
            <label><input type="radio" name="sex" value="other"> その他</label>
          </td>
        </tr>
        <tr id="hobby" class="table_1__tr">
          <th class="table_1__th">
            趣味
          </th>
          <td class="table_1__td">
            
            <input type="checkbox" id="checkbox" v-model="checked">
            <label for="checkbox">{{ checked }}</label>
            
            <label><input type="checkbox" name="hobby[]" value="ゲーム" v-model="checked"> ゲーム</label>
            <label><input type="checkbox" name="hobby[]" value="音楽" v-model="checked"> 音楽</label>
            <label><input type="checkbox" name="hobby[]" value="山登り" v-model="checked"> 山登り</label>
          </td>
        </tr>
      </tbody>
    </table><!-- /.table_1 -->
  </div><!-- /.div_1 -->
  
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
