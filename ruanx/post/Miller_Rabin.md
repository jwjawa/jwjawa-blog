#Miller-Rabin判素法

###身败名裂的阮行止这篇文章出错了。
###注意下面介绍的算法只是伪素数测试

给定一个数$n$，判断它是否是**质数**。$n<=2\times 10^9$.

回顾以前判断素数的办法。我们把$n$在$[1,\sqrt{n}]$的范围内试除，看是否有数能整除$n$。算法的时间复杂度是$O(\sqrt{n})$的。这里跑不过。


##费马小定理

$\forall n\in Z_+$、$p$为质数，有$n^{p}\equiv n \pmod p$.  
更一般的**欧拉定理**：$\forall \gcd(p,n)=1$，有$n^{\varphi(p)} \equiv 1 \pmod p$.  

考虑费马小定理的**逆命题**。  
若$n^{p}\equiv n \pmod p$，则$p$为质数。

这个命题显然是错的，但是它**几乎**成立。因此我们可以用它来判定素数。  

##伪素数判断

随机选择$x$，如果$x^n \not\equiv x \pmod n$，那么$n$肯定不是质数。

因为有可能出错，所以我们选择**多个底数**来测试。如果所有的测试都认为$n$是质数，那么我们就认为它是质数。

这样写：  
```cpp
bool is_prime(int x)
{
	int i,x;
	for(i=0;i<lambda;i++)
	{
		x=rand()%n+1;
		if((pow(x,n)%n)!=x) return 0;       //发现不符合
	}
	return 1;
}
```

lambda是测试次数。这个东西设为多少看数据范围。  

最终代码：
```cpp
#define lambda 233

long long pow(long long a,long long b,long long mod)       
{
	long long tmp;
	if(b==0) return 1;
	if(b==1) return a;
	
	tmp=pow(a,b/2,mod);
	if(b%2==0) return tmp%mod*tmp%mod; //b是偶数
	else return tmp%mod*tmp%mod*a%mod;     //b是奇数
}//快速幂，计算a^b对mod取模的结果

bool is_prime(long long n)
{
	long long i,x;
	
	for(i=0;i<lambda;i++)
	{
		x=rand()%(n-1)+1;               //随便选个[1,n-1]的数
		if(pow(x,n,n)!=x) return 0;     //如果x^n模n的结果不是n,则n必不是质数
	}
	
	return 1;
}//质数返回1,合数返回0
```

##复杂度讨论  
这东西的复杂度是多少呢？

对于每一次测试$x$，快速幂计算$x^n$将会耗费$log_n$的时间。  
那么总的时间复杂度就是$\lambda * log_n$。

##tyvj P4192 素数测试  
给定一个$n$，判断$n$是否为质数。  

Code  
```cpp
#include <cstdio>
#include <cstdlib>

#define lambda 10

long long pow(long long a,long long b,long long mod)       //快速幂，计算a^b对mod取模的结果
{
	long long tmp;
	if(b==0) return 1;
	if(b==1) return a;
	
	tmp=pow(a,b/2,mod);
	if(b%2==0) return tmp%mod*tmp%mod; //b是偶数
	else return tmp%mod*tmp%mod*a%mod;     //b是奇数
}

bool is_prime(long long n)
{
	long long i,x;
	
	for(i=0;i<lambda;i++)
	{
		x=rand()%(n-1)+1;               //随便选个[1,n-1]的数
		if(pow(x,n,n)!=x) return 0;     //如果x^n模n的结果不是n,则n必不是质数
	}
	
	return 1;
}

int main()
{
	long long x;
	scanf("%lld",&x);
	printf("%s\n",Miller_Rabin(x)==0?"No":"Yes");
}
```

由于tyvj数据很水，lambda取1(只测试一次)都能过……

***
update on 2016.8.31

**关于出错**  

经过证明，如果是真的`Miller-Rabin`算法，取**前二十个质数**为底数来测验，可以保证在`int`范围内不出错。  

