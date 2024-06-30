# 34ml-course-portal

This project is a comprehensive course portal where users can enroll in courses, complete lessons, and unlock various achievements based on their interactions. Users will receive badges for their achievements and notifications via email, with the system handling notifications asynchronously.


Features
Course Enrollment: Users can enroll in courses.
Lesson Completion: Users can complete lessons and track their progress.
Achievements: Users unlock achievements based on lessons watched and comments written.
Badges: Users earn badges based on the number of achievements unlocked.
Notifications: Users receive email notifications when they unlock new achievements.
Asynchronous Notifications: Notifications are handled asynchronously to ensure smooth user experience.
Achievements
Lessons Watched Achievements
First Lesson Watched
5 Lessons Watched
10 Lessons Watched
25 Lessons Watched
50 Lessons Watched
Comments Written Achievements
First Comment Written
3 Comments Written
5 Comments Written
10 Comments Written
20 Comments Written
Badges
Beginner: 0 Achievements
Intermediate: 4 Achievements
Advanced: 8 Achievements
Master: 10 Achievements
API Endpoints
Achievements Endpoint
Endpoint
GET /api/users/{user}/achievements

Response
json
Copy code
{
    "unlocked_achievements": ["First Lesson Watched", "5 Lessons Watched", "First Comment Written"],
    "next_available_achievements": ["10 Lessons Watched", "3 Comments Written"],
    "current_badge": "Beginner",
    "next_badge": "Intermediate",
    "remaining_to_unlock_next_badge": 3
}
unlocked_achievements (string[])

An array of the user’s unlocked achievements by name.
next_available_achievements (string[])

An array of the next achievements the user can unlock by name.
Note: Only the next available achievement should be returned for each group of achievements.
current_badge (string)

The name of the user’s current badge.
next_badge (string)

The name of the next badge the user can earn.
remaining_to_unlock_next_badge (int)

The number of additional achievements the user must unlock to earn the next badge.