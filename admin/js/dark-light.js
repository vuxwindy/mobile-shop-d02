
    // Lấy trạng thái từ localStorage nếu có
    const savedMode = localStorage.getItem('backgroundMode');
    const body = document.body;
    const select = document.getElementById('background_color');

    // Áp dụng trạng thái lưu trữ (nếu tồn tại)
    if (savedMode) {
        body.className = savedMode === 'dark' ? 'dark-mode' : 'light-mode';
        select.value = savedMode;
    }

    // Xử lý sự kiện khi nhấn nút "Lưu Cấu Hình"
    document.getElementById('saveSettings').addEventListener('click', function () {
        const selectedMode = select.value;

        // Thay đổi class của body
        body.className = selectedMode === 'dark' ? 'dark-mode' : 'light-mode';

        // Lưu trạng thái vào localStorage
        localStorage.setItem('backgroundMode', selectedMode);
    });
