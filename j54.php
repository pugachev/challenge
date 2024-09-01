<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Box Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="select-container">
        <div class="select-box" data-id="0">
            <select class="age-select">
                <option value="0">---</option>
                <option value="1">20</option>
                <option value="2">30</option>
                <option value="3">40</option>
            </select>
            <select class="course-select" disabled>
                <option value="0">---</option>
                <option value="1">Course 1</option>
                <option value="2">Course 2</option>
            </select>
        </div>
    </div>
    <button id="addSelect">Add Select</button>
    <button id="deleteSelect">Delete Select</button>

    <p>People count: <span id="peopleCount">0</span></p>

    <script>
        let addChildArray = [];
        let peopleCount = 0;

        function updateSelectState(selectBox) {
            const ageSelect = selectBox.find('.age-select');
            const courseSelect = selectBox.find('.course-select');
            const id = selectBox.data('id');

            if (ageSelect.val() === "0") {
                // Only disable course select if this is the first select box
                if (selectBox.index() === 0) {
                    courseSelect.prop('disabled', true).val("0");
                }
            } else {
                // Enable course select if age is set to something other than "0"
                courseSelect.prop('disabled', false);
            }

            if (ageSelect.val() !== "0" && courseSelect.val() !== "0") {
                // Add to addChildArray if both are selected
                if (addChildArray.indexOf(id) === -1) {
                    addChildArray.push(id);
                    peopleCount++;
                }
            } else {
                // Remove from addChildArray and decrease peopleCount if either is "0"
                const index = addChildArray.indexOf(id);
                if (index !== -1) {
                    addChildArray.splice(index, 1);
                    peopleCount--;
                }
            }

            $('#peopleCount').text(peopleCount);
        }

        $('#addSelect').click(function() {
            const newId = $('.select-box').length;
            const newSelectBox = `
                <div class="select-box" data-id="${newId}">
                    <select class="age-select">
                        <option value="0" selected>---</option>
                        <option value="1">20</option>
                        <option value="2">30</option>
                        <option value="3">40</option>
                    </select>
                    <select class="course-select">
                        <option value="0" selected>---</option>
                        <option value="1">Course 1</option>
                        <option value="2">Course 2</option>
                    </select>
                </div>`;
            $('#select-container').append(newSelectBox);

            // 初期化されてもdisabledにならないように設定
            const addedBox = $(`.select-box[data-id="${newId}"]`);
            const ageSelect = addedBox.find('.age-select');
            const courseSelect = addedBox.find('.course-select');

            ageSelect.val("0");
            courseSelect.val("0").prop('disabled', false);
        });

        $('#deleteSelect').click(function() {
            const selectBoxes = $('.select-box');
            
            if (selectBoxes.length > 1) {
                // 複数ある場合は最後のセレクトボックスを削除
                const lastSelectBox = selectBoxes.last();
                const id = lastSelectBox.data('id');

                // Remove from addChildArray if it exists
                const index = addChildArray.indexOf(id);
                if (index !== -1) {
                    addChildArray.splice(index, 1);
                    peopleCount--;
                    $('#peopleCount').text(peopleCount);
                }

                lastSelectBox.remove();
            } else if (selectBoxes.length === 1) {
                // 1つしかない場合は年齢とコースを初期化してコースを無効化
                const firstSelectBox = selectBoxes.first();
                const ageSelect = firstSelectBox.find('.age-select');
                const courseSelect = firstSelectBox.find('.course-select');

                ageSelect.val("0");
                courseSelect.val("0").prop('disabled', true);

                // Remove from addChildArray and decrease peopleCount if necessary
                const id = firstSelectBox.data('id');
                const index = addChildArray.indexOf(id);
                if (index !== -1) {
                    addChildArray.splice(index, 1);
                    peopleCount--;
                    $('#peopleCount').text(peopleCount);
                }
            }
        });

        $(document).on('change', '.age-select, .course-select', function() {
            const selectBox = $(this).closest('.select-box');
            updateSelectState(selectBox);
        });

    </script>
</body>
</html>
