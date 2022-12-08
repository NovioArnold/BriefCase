def fib(n):
    if n == 0:
        return 0
    elif n == 1:
        return 1
    else:
        return fib(n-1) + fib(n-2)

list1 = [x for x in range(39)]
list2 = [i for i in list1 if fib(i) % 2 == 0]

print(fib(6))

def fib_to(n):
    fibs = [0, 1]
    for i in range(2, n+1):
        fibs.append(fibs[-1] + fibs[-2])
    return fibs


print(fib_to(6))