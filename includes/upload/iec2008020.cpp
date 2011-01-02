#include <iostream>
#include <string>
#include <vector>

using namespace std;

int main()
{
	vector<string>v1;
	vector<string>v2;
	string s;
	string s1;	

	v1.push_back("TTT");
	v1.push_back("TTC");
	v1.push_back("TTA");
	v1.push_back("TTG");
	v1.push_back("TGT");
	v1.push_back("TGC");
	v1.push_back("TGA");
	v1.push_back("TGG");

	v2.push_back("F");
	v2.push_back("F");
	v2.push_back("L");
	v2.push_back("L");
	v2.push_back("C");
	v2.push_back("C");
	v2.push_back("Stop");
	v2.push_back("W");

	cout<<"Input"<<endl;
	cin>>s;
	cout<<"Output"<<endl;
	for(int i=0;i<s.length()-2;i+=3){
		
		for (int j=0;j<v1.size();j++)
			{
				if(s.substr(i,3)==v1[j]){
					cout<<v2[j];
				} 
			}
		
	}
	cout<<endl;

	return 0;

}


