Algorithm - a step-by-step process to solve a problem, using natural languages (such as English), flow charts, and pseudocode (using programming language without syntaxes and not executable on a computer).

Sources: 
- Abdul Bari's Definition of Algorithm in Lesson 1
- https://www.khanacademy.org/computing/ap-computer-science-principles/algorithms-101/building-algorithms/a/expressing-an-algorithm#:~:text=We%20can%20express%20an%20algorithm,algorithm%20to%20a%20wide%20audience.

Algorithm Characteristics:
1. Input - must have 0 or more inputs
2. Output - must have at least 1 output
3. Definiteness - each step must be clear
4. Finiteness - ends after a number of finite steps
5. Effectiveness - only have necessary steps

How to Analyze an Algorithm:
1. Time Complexity - how much time does an algorithm take, calculated by this: one statement = one unit of time.
2. Space Complexity - how much memory space does an algorithm take, calculated by the number of variables. 

Time Complexity:


O(1) - an algorithm takes the same amount of time to run regardless of the input size
Example:
function isEvenOrOdd(n) {
  return n / 2 ? 'Odd' : 'Even';
}
Regardless of whether n = 10 or 10,000,000, the statement will only be executed once. Therefore, regardless of the input size, the algorithm takes the same amount of time -- hence, the algorithm has O(1).



O(n) - an algorithm has a linear time complexity. In other words, when the input size = 5, then the amount of time = 5 unit of time; if the input size = 2, then the amount of time = 2. 
Example:
function(array) {
  for(let i = 0; i < array.length; i++) {
    print(array[i]);
  }
}
If the array's length increases, the time it takes to run this function also increases by the same amount. If array's length = 5, then it takes 5 unit of time; if array's length = 50, then it takes 50 units of time. Therefore, it's O(n).



O(n^2) - an algorithm's input size = 5, then the amount of time = 5^2 = 25 unit of time. 

O(n^2) - an algorithm's amount of time to run grows based on the input size's power of 2

for loop's time complexity = O(n)
(n+1) + n = 2n + 1 -> O(n)

nested loop's time complexity is usually O(n^2)

https://www.bigocheatsheet.com/


log(200) = 2.301
10^? = 200
? = 2.301

This means that input size = 200 only takes 2.301 unit of time.

log(50) = 1.70
10^? = 50
? = 1.70

This means that input size = 50 only takes 1.70 unit of time.

binary search is a very efficient and fast algorithm to search for an element inside a sorted list of elements. 

merge sort 





---
Program - implementation of an algorithm using a programming language

Sources: 
- https://www.quora.com/What-is-the-difference-between-algorithms-and-programs (Approved by my CSCI TA, Charles)
- https://quizlet.com/186738207/algorithms-and-program-development-flash-cards/#:~:text=A%20program%20is%20an%20implementation,a%20particular%20kind%20of%20computer.&text=Algorithm%20is%20what%20needs%20to,is%20how%20it%20is%20done.
- https://www.geeksforgeeks.org/difference-between-algorithm-pseudocode-and-program/#:~:text=Algorithm%20vs%20Pseudocode%20vs%20Program%3A&text=While%20algorithms%20are%20generally%20written,in%20a%20particular%20programming%20language.





