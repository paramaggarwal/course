#include <iostream>
#include <string>

using namespace std;

int main()
{
	string s1;
	string s2;
	string s3;
	int i;
	
	cin >> s1;

	for(i=0;i<s1.length();i++){

		s2 = s1.substr(i,3);
		
		if(s2=="TTT"){
				s3 = s3 + "F";
			}else if(s2=="TTC"){
					s3 = s3 + "F";
				}else if(s2=="TTA"){
						s3 = s3 + "L";
					}else if(s2=="TTG"){
							s3 = s3 + "L";
						}else if(s2=="TGT"){
								s3 = s3 + "C";
							}else if(s2=="TGC"){
									s3 = s3 + "C";
								}else if(s2=="TGA"){
										break;
									}else if(s2=="TGG"){
											s3 = s3 + "W";
									}

		i = i + 2;
	}

	cout << s3 << endl;

return 0;
}
			
