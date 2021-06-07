# Objectivity Calendar Generator.

This system contains various useful classes for DateTime manipulation. 

It also contains numerous container classes for periods to which events may be attached, and a calendar generator that can generator a nested CalendarYear structure, cache its structure and then inject events dynamically into the resulting instance.

This method means we can generate a complete calendar for a year once, cache it, then use it again and again in different contexts by injecting different events into it.

The key distinction is that a calendar year is just a container that contains CalendarMonths, which contain CalendarWeeks and CalendarDays.

Note that when you are using the CalendarWeeks withing the context of a month, then accessing that CalendarWeek's Days, the CalendarWeek will often contain days which aren't within the month. For example, if a month starts on a Thursday, the CalendarDays for that week will include the last Sunday, Monday, Wednesday and Thursday of the previous months.

To filter days that are within a week but NOT within a month in this situation, use the isWithin(DateTimeInterface $start, DateTimeInterface $end, bool $inclusive = true) function. So, within twig, for example, whilst iterating through months: {% if day.isWithin(month.getPeriodStart, month.getPeriodEnd) %}...{% endif %}