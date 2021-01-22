<script src="//unpkg.com/flatpickr"></script>
<script src="//unpkg.com/flatpickr/dist/l10n/ja.js"></script>
<script>
    flatpickr("#due_date", {
        // 日本語化
        locale: "ja",
        // 日付の表示形式
        dateFormat: "Y/m/d",
        // 今日以降の日付のみ選択可
        minDate: "today",
    });
</script>