function follow() {
    const follow = document.querySelectorAll('p.follow');
    for(let i=0; i < follow.length; i++){
        follow[i].addEventListener('click', function() {
            const toFollowName = this.getAttribute("data-selected-name");

            fetch('follow.php?to_follow_name=' + toFollowName)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // this.className = 'unfollow';
                        // this.innerHTML = "フォロー中";
                        alert(toFollowName + 'さんをフォローしました');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('エラーが発生しました:', error);
                });

        });
    }
}

function unfollow() {
    const unfollow = document.querySelectorAll('p.unfollow');
    for(let i=0; i < unfollow.length; i++){
        unfollow[i].addEventListener('click', function() {
            console.log(this);
            const toUnfollowName = this.getAttribute("data-selected-name");
            console.log(toUnfollowName);
            if(confirm(toUnfollowName + 'さんへのフォローを解除しますか？')){
                fetch('follow.php?to_unfollow_name=' + toUnfollowName)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // alert(toUnfollowName + 'さんのフォローを解除しました');
                            location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('エラーが発生しました:', error);
                    });
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    follow();
    unfollow();
});