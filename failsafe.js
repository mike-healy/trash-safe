( function() {
    if (typeof document.querySelectorAll === 'undefined') {
        console.warn('Browser support for querySelectorAll is required for Trash Fail Safe');
        return;
    }

    const postForm = document.getElementById('posts-filter');
    if (typeof postForm === 'undefined' || !postForm) {
        return;
    }

    //Allow normal click handling for elements other than span.delete a.submitdelete
    //(i.e. don't halt on move to trash)
    postForm.addEventListener('click', function(ev) {

        if (ev.target.matches('input#delete_all') && !confirm('Are you sure you want to empty trash and delete all trashed items?')) {
            ev.preventDefault();
            return;
        }

        //Media list has native confirmation, so we don't need to double up on it.
        const isMediaListTable = jQuery(ev.target).closest('table.media').length === 1;

        if (!ev.target.matches('a.submitdelete') || !ev.target.parentElement.matches('span.delete') || isMediaListTable) {
            return;
        }

        if (!confirm('Are you sure you want to permanently delete this item?')) {
            ev.preventDefault();
        }
    });

} )();