document.getElementById('logout-btn').addEventListener('click', function() {
    document.getElementById('logoutModal').style.display = 'block';
  });
  
  document.getElementById('cancelLogout').addEventListener('click', function() {
    document.getElementById('logoutModal').style.display = 'none';
  });
  
  document.getElementById('logout-btn').addEventListener('click', function() {
    // Perform logout action here
    alert('Logged out successfully!');
    // Redirect to logout page or perform other logout actions
  });
  