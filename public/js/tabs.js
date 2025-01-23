document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabsContentContainer = document.getElementById('tabs-content-container');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to the clicked button
            button.classList.add('active');

            // Hide all tab contents
            tabsContentContainer.querySelectorAll('.tab-content').forEach(tabContent => {
                tabContent.classList.add('hidden');
            });

            // Show the target tab content
            const targetId = button.getAttribute('data-target');
            document.getElementById(targetId).classList.remove('hidden');
        });
    });
});