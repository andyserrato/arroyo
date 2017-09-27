<th><label for="dnp_cklist">DNP Options</label></th>
<td><input type="checkbox" name="Do not publish my phone in the printed directory" <?php if('on'==esc_attr(get_the_author_meta('dnp_cklist',$user->ID ))) echo 'checked="checked"'; ?>/> Do not publish my phone in the printed directory<br />
 
<input type="checkbox" name="Do not publish my age in the printed directory" <?php if('on'==esc_attr(get_the_author_meta('dnp_cklist',$user->ID ))) echo 'checked="checked"'; ?>/> Do not publish my age in the printed directory<br />
 
<input type="checkbox" name="Do not publish my phone in the members area" <?php if('on'==esc_attr(get_the_author_meta('dnp_cklist',$user->ID ))) echo 'checked="checked"'; ?>/> Do not publish my phone in the members area<br />
 
<input type="checkbox" name="Do not publish my age in the members area" <?php if('on'==esc_attr(get_the_author_meta('dnp_cklist',$user->ID ))) echo 'checked="checked"'; ?>/> Do not publish my age in the members area<br />
 
<input type="checkbox" name="Do not list me at all in the members area" <?php if('on'==esc_attr(get_the_author_meta('dnp_cklist',$user->ID ))) echo 'checked="checked"'; ?>/> Do not list me at all in the members area <br />
 
<input type="checkbox" name="List everything in both directories" <?php if('on'==esc_attr(get_the_author_meta('dnp_cklist',$user->ID ))) echo 'checked="checked"'; ?>/> List everything in both directories<br />
</td>
</tr>

<tr>
    <th>
        <label for="HClunes">Trabaja el lunes</label>
    </th>
    
    <td>
        <input type="checkbox" name="HClunes" id="HClunes" <?php if('on'==esc_attr(get_the_author_meta('HClunes',$user->ID ))) echo 'checked="checked"'; ?>/> Do not publish my phone in the printed directory<br />
     
    </td>
</tr>