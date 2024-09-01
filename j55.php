<dt class="col-sm-4 reserve-menu-h2">
    <h2>Menu (Child)</h2>
</dt>
<dd class="col-sm-8">     
    <div id="kids-course-groups" class="course-child-groups" style="display:none;">       
        <!-- 初期の1つ目のセレクトボックス -->
        <div class="kids-course-group course-groups">
            <div class="form-group" style="display: flex;width:500px;flex-direction: row;">        
                <div style="width:40px;text-align:center;margin-right:5px;margin-top:8px;">Age</div>
                <div style="width:100px;">
                    <select class="form-control age-select" name="OrderCoursesKids[AGES_OF_CHILDREN][0]" > 
                        <option value="0">---</option>
                        <option value="1">1</option>             
                        <option value="2">2</option>             
                        <!-- 他のオプションも同様に続きます -->
                        <option value="16">16</option>     
                    </select>
                </div>
                <div style="width:55px;margin-top:8px;margin-left:5px;text-align:left;"> year-old </div>
                <div class="help-block"></div>
            </div>

            <div class="form-group field-ordercourses-course_kids required">           
                <select class="form-control course-form" name="OrderCoursesKids[COURSE_JP][0]" disabled>             
                    <option value="0">Select courses</option>           
                </select>            
                <div class="help-block"></div>         
            </div>
        </div>     
    </div>
</dd> 

<!-- ボタンを追加 -->
<button id="addSelect" type="button">Add Select</button>
<button id="deleteSelect" type="button">Delete Select</button>

<!-- jQueryスクリプト -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let count = 0;
    let addChildArray = [];
    
    // 初期の年齢セレクトボックスのイベント設定
    function initializeSelect(index) {
        const ageSelect = $(`#ordercourses-ages_of_children_${index}`);
        const courseSelect = $(`#ordercourses-course_kids_${index}`);
        
        ageSelect.on('change', function() {
            const ageValue = $(this).val();
            if (ageValue === "0") {
                courseSelect.prop('disabled', true);
                removeFromArray(index);
            } else {
                courseSelect.prop('disabled', false);
            }
            updateAddChildArray(index, ageValue, courseSelect.val());
        });
        
        courseSelect.on('change', function() {
            const courseValue = $(this).val();
            updateAddChildArray(index, ageSelect.val(), courseValue);
        });
    }

    function updateAddChildArray(index, ageValue, courseValue) {
        if (ageValue !== "0" && courseValue !== "0") {
            if (!addChildArray.includes(index)) {
                addChildArray.push(index);
                $("#people-count").text(addChildArray.length);
            }
        } else {
            removeFromArray(index);
        }
    }
    
    function removeFromArray(index) {
        const arrayIndex = addChildArray.indexOf(index);
        if (arrayIndex > -1) {
            addChildArray.splice(arrayIndex, 1);
            $("#people-count").text(addChildArray.length);
        }
    }

    $('#addSelect').click(function() {
        count++;
        const newGroup = `
        <div class="kids-course-group course-groups">
            <div class="form-group" style="display: flex;width:500px;flex-direction: row;">        
                <div style="width:40px;text-align:center;margin-right:5px;margin-top:8px;">Age</div>
                <div style="width:100px;">
                    <select class="form-control age-select" id="ordercourses-ages_of_children_${count}" name="OrderCoursesKids[AGES_OF_CHILDREN][${count}]" > 
                        <option value="0">---</option>
                        <option value="1">1</option>             
                        <option value="2">2</option>             
                        <!-- 他のオプションも同様に続きます -->
                        <option value="16">16</option>     
                    </select>
                </div>
                <div style="width:55px;margin-top:8px;margin-left:5px;text-align:left;"> year-old </div>
                <div class="help-block"></div>
            </div>

            <div class="form-group field-ordercourses-course_kids required">           
                <select class="form-control course-form" id="ordercourses-course_kids_${count}" name="OrderCoursesKids[COURSE_JP][${count}]" disabled>             
                    <option value="0">Select courses</option>           
                </select>            
                <div class="help-block"></div>         
            </div>
        </div>`;
        $('#kids-course-groups').append(newGroup);
        initializeSelect(count);
    });

    $('#deleteSelect').click(function() {
        if (count > 0) {
            $(`#ordercourses-ages_of_children_${count}`).closest('.kids-course-group').remove();
            removeFromArray(count);
            count--;
        }
    });

    // 初期化のための呼び出し
    initializeSelect(0);
});
</script>
