document.addEventListener('DOMContentLoaded', () => {
    const followLink = document.querySelectorAll('p.follow');
    for(let i=0; i < followLink.length; i++){
        followLink[i].addEventListener('click', function() {
            const selectedName = this.getAttribute("data-selected-name");

            fetch('check_public_status.php?selected_name=' + selectedName)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // this.className = 'unfollow';
                        // this.innerHTML = "フォロー中";
                        alert(selectedName + 'さんをフォローしました');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('エラーが発生しました:', error);
                });

        });
    }
});