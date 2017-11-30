<select id="membr-family-name" name="membr-family-name" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
<?php

$isFound = sizeof($memberFamilyName);

if($isFound==0){
	echo '<option value="0">Nothing Found</option>';
}
else{
 foreach($memberFamilyName as $family_name): ?>
<option value="<?php echo $family_name['id'];?>"><?php echo $family_name['familyname'];?></option>
<?php endforeach;
} ?>
</select>
