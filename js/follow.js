document.addEventListener('DOMContentLoaded', () => {
    const followLink = document.querySelectorAll('a.follow_link');
    for(let i=0; i < followLink.length; i++){
        followLink[i].addEventListener('click', function(event) {
            const selectedName = this.getAttribute("data-selected-name");

            fetch('check_public_status.php?selected_name=' + selectedName)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.innerHTML = "フォロー中";
                        alert(selectedName + 'さんをフォローしました');
                        event.preventDefault(); // フォローできた場合、デフォルトの動作を無効にする
                    }
                })
                .catch(error => {
                    console.error('エラーが発生しました:', error);
                });

            // 非同期処理の結果を待つため、ここで一度デフォルト動作を無効にする
            event.preventDefault();
        });
    }
});